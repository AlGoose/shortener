@extends('layouts.default')
@section('content')
<div class="container mt-3">
    <div class="card">
        <h5 class="card-header">
            Статистика по ссылке {{ $short_link }}
        </h5>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Картинка</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($views as $key => $view)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $view->client_ip }}</td>
                        <td>{{ $view->created_at }}</td>
                        @if(!is_null($view->picture))
                        <td><img src="http://shortener.test/storage/ads/{{ $view->picture }}" alt="ads" width="250px"></td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection