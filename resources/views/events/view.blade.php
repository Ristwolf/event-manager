@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $event->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>
            <p><strong>Descrição:</strong> {{ $event->description }}</p>
            <p><strong>Endereço:</strong> {{ $event->address }}</p>
            <p><strong>Data e Hora:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($event->price, 2, ',', '.') }}</p>
            <p><strong>Mapa:</strong> <a href="{{ $event->address_link }}" target="_blank">Ver no Google Maps</a></p>

            <div class="mt-4">
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">✏️ Editar</a>

                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este evento?')">🗑 Excluir</button>
                </form>

                <a href="{{ route('events.index') }}" class="btn btn-secondary">🔙 Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
