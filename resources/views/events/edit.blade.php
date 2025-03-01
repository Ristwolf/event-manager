@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
    <h1>Editar Evento</h1>
    
<p>Campos contento * são obrigatórios.</p>

    @include('components.alerts') <!-- Exibir alertas -->

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Tipo do Evento*</label>
            <select name="type" id="type" class="form-control" required>
                @php
                    $types = ['social', 'cultural', 'esportivo', 'corporativo', 'religioso', 'entretenimento', 'outros'];
                @endphp
                @foreach ($types as $type)
                    <option value="{{ $type }}" {{ $event->type == $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nome do Evento*</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Endereço*</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $event->address }}" required>
        </div>

        <div class="mb-3">
            <label for="address_link" class="form-label">Link do Endereço (Google Maps)</label>
            <input type="url" name="address_link" id="address_link" class="form-control" value="{{ $event->address_link }}">
        </div>

        <div class="mb-3">
            <label for="start_datetime" class="form-label">Data e Hora Inicial*</label>
            <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control"
                value="{{ date('Y-m-d\TH:i', strtotime($event->start_datetime)) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $event->price }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
