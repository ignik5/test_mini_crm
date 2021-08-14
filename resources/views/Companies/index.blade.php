@extends('layouts.master')
@section('title','Компании')
@section('menu')
@include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-body">
                        <p>adminka </p>
                        <div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Название
                                    </th>
                                    <th>
                                        email
                                    </th>
                                    <th>
                                        Телефон
                                    </th>
                                    <th>
                                        Сайт
                                    </th>
                                    <th>
                                        Действия
                                    </th>
                                </tr>
                                @foreach($Companies as $Company)
                                    <tr>
                                        <td>{{ $Company->id }}</td>
                                        <td>{{ $Company->name }}</td>
                                        <td>{{ $Company->email }}</td>
                                        <td>{{ $Company->phone }}</td>
                                        <td>{{ $Company->website }}</td>
                                     {{--   // 'logo'--}}
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('company.destroy', $Company) }}" method="POST">
                                                    <a class="btn btn-success" type="button" href="{{ route('company.show', $Company) }}">Открыть</a>
                                                    <a class="btn btn-warning" type="button" href="{{ route('company.edit', $Company) }}">Редактировать</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('company.create') }}"><button type="button" class="bth btn-success">Создать новую компанию</button></a>
                            {{$Companies->links()}}
                        </div>
                    </div></div></div></div>
@endsection
