@extends('layouts.app')

@section('title', 'Cadastrar Novo Evento')

@section('content')


<h1>Cadastrar Novo Evento</h1>
<p>Campos contento * são obrigatórios.</p>

    @include('components.alerts')   

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Tipo do Evento *</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Selecione...</option>
                <option value="social">🗣️ Social</option>
                <option value="cultural">🎭 Cultural</option>
                <option value="esportivo">🏅 Esportivo</option>
                <option value="corporativo">🏢 Corporativo</option>
                <option value="religioso">⛪ Religioso</option>
                <option value="entretenimento">🎤 Entretenimento</option>
                <option value="outros">Outros</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nome do Evento*</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Ex.: Show da banda ..." required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descreva o evento."></textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Endereço*</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Rua, número - Cidade - Estado, CEP." required>
        </div>

        <div class="mb-3">
            <label for="address_link" class="form-label">Link do Google Maps</label>
            <input type="url" name="address_link" id="address_link" class="form-control" placeholder="Inserir link do Google Maps">
        </div>

        <div class="mb-3">
            <label for="start_datetime" class="form-label">Data e Hora Inicial*</label>
            <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Preço (R$)</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" placeholder="Preencher apenas com números.">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Evento</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
