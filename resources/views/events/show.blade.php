@extends('layouts.app')

@section('content')
<div class="position-relative min-vh-100">
    <div class="position-absolute top-66 start-50 translate-middle-x bg-white shadow-lg p-4 w-90 max-w-lg">
        <h1 class="fs-4 fw-bold mb-4 text-center">{{ $event->name }}</h1>

        <div class="card mx-auto shadow-sm rounded-lg p-4 w-100 max-w-3xl">
            <p><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>
            <p><strong>Descrição:</strong> {{ $event->description }}</p>
            <p><strong>Endereço:</strong> {{ $event->address }}</p>
            <p><strong>Data e Hora:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y H:i') }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($event->price, 2, ',', '.') }}</p>
            <p><strong>Mapa:</strong> <a href="{{ $event->address_link }}" target="_blank" class="text-primary text-decoration-underline">Ver no Google Maps</a></p>

            <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">✏️ Editar evento</a>

                <form action="{{ route('events.destroy', $event->id) }}" method="POST" 
                      onsubmit="return confirm('Tem certeza que deseja excluir este evento?')" 
                      class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Excluir</button>
                </form>

                <a href="{{ route('events.index') }}" class="btn btn-primary">🏠 Voltar ao início</a>
            </div>
        </div>
    </div>
</div>



@endsection
