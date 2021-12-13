@extends('layouts.default')
@section('content')
<div class="container mt-3">
    <div class="card">
        <h5 class="card-header">
            Общая статистика
        </h5>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Всего ссылок
                    <span class="badge bg-primary rounded-pill">{{ $res->totalLinks }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Всего обычных ссылок
                    <span class="badge bg-primary rounded-pill">{{ $res->totalNormalLinks }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Всего коммерческих ссылок
                    <span class="badge bg-primary rounded-pill">{{ $res->totalCommercialLinks }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Всего просмотров
                    <span class="badge bg-primary rounded-pill">{{ $res->totalViews }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Количество уникальных пользователей за последние 14 дней
                    <span class="badge bg-primary rounded-pill">{{ $res->totalUniqueUsers }}</span>
                </li>
            </ul>
        </div>
    </div>

</div>
@endsection