@extends('layouts.app')

@section('title', 'Lista de Eventos')

@section('content')
@include('components.alerts')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Bem vindo!</h1>
    <a href="{{ route('events.create') }}" class="btn btn-success">Criar Novo Evento</a>
</div>


    <p>*Para editar ou excluir eventos, entre em "Visualizar mais informações".</p>



    <form action="{{ route('events.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar eventos..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    

    <div class="max-w-full mx-auto p-4">
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 border-b bg-light">
                <h2 class="text-xl font-semibold text-gray-700">Lista de Eventos</h2>
            </div>
            
            <div class="table-responsive">
                <table class="table w-100 border-collapse">
                    <thead>
                        <tr class="bg-light">
                            <th class="p-3 text-left border-b">Nome</th>
                            <th class="p-3 text-left border-b">Tipo</th>
                            <th class="p-3 text-left border-b">Endereço</th>
                            <th class="p-3 text-left border-b">Data e Hora</th>
                            <th class="p-3 text-left border-b">Preço</th>
                            <th class="p-3 text-left border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $index => $event)
                        <tr class="border-b border-gray-300 hover:bg-gray-50 {{ $index % 2 == 0 ? 'bg-white' : 'bg-light' }}">
                            <td class="p-3">{{ $event->name }}</td>
                            <td class="p-3">{{ ucfirst($event->type) }}</td>
                            <td class="p-3">{{ $event->address }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</td>
                            <td class="p-3 text-left border-b text-nowrap" style="min-width: 120px;">R$ {{ number_format($event->price, 2, ',', '.') }}</td>
                            <td class="p-3">
                                <form action="{{ route('events.show', $event) }}" method="GET">
                                    <button type="submit" class="btn btn-primary btn-sm">Visualizar mais informações</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
    <div class="mt-4">
        {{ $events->links() }}
    </div>
    
    
@endsection
