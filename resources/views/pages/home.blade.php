@extends('layouts.default')
@section('content')
<div class="container mt-3">
    @if(session('status'))
    <div class="alert alert-success">
        <p>{{ session('status') }}</p>
        <p>Ссылка: <a href="{{ session('short_link') }}" target="_blank">{{ session('short_link') }}</a></p>
        <p>Статистика: <a href="{{ session('stats_link') }}" target="_blank">{{ session('stats_link') }}</a></p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <h5 class="card-header">
            Создать короткую ссылку
        </h5>
        <div class="card-body">
            <form action="/create" method="POST">
                @csrf
                <label for="source_link" class="form-label">Исходная ссылка:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">&#128279</span>
                    <input type="text" class="form-control" name="source_link" id="source_link" value="{{ old('source_link') }}" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <label for="code" class="form-label">Короткая ссылка (опционально):</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">http://shortener.test/</span>
                    <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" placeholder="gotterdammerung" aria-describedby="basic-addon3">
                </div>

                <label for="code" class="form-label">Тип ссылки:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="normal" {{ old('type') == "normal" ? 'checked' : '' }} required>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Обычная ссылка
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="commercial" {{ old('type') == "commercial" ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Коммерческая ссылка
                    </label>
                </div>

                <label for="days" class="form-label">Срок действия ссылки (1-30 дней):</label>
                <div class="input-group mb-3">
                    <input type="number" id="days" name="days" min="1" max="30" value="{{ old('days', 1) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Уменьшить</button>
            </form>
        </div>
    </div>
</div>
@endsection