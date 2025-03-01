<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Event::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $events->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('start_datetime', 'like', "%{$search}%")
                    ->orWhere('price', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $events->where('type', $request->type);
        }
        if ($request->filled('name')) {
            $events->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('address')) {
            $events->where('address', 'like', '%' . $request->address . '%');
        }
        if ($request->filled('start_date')) {
            $events->whereDate('start_datetime', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $events->whereDate('start_datetime', '<=', $request->end_date);
        }
        if ($request->filled('price_min')) {
            $events->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $events->where('price', '<=', $request->price_max);
        }

        // Adiciona paginação
        $events = $events->paginate(5);

        return view('events.index', compact('events'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:events,name',
            'type' => 'required',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'address_link' => 'nullable|url',
            'start_datetime' => 'required|date',
            'price' => 'required|numeric|min:0',
        ], [
            'name.unique' => 'Já existe um evento com este nome.',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Evento cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'type' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'address' => 'required',
            'address_link' => 'nullable|url',
            'start_datetime' => 'required|date',
            'price' => 'nullable|numeric|min:0',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }
}
