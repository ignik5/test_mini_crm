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
                        <p>Компания {{ $Company->name }} </p>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>ID {{ $Company->id }}</td>
                                        <td>Название {{ $Company->name }}</td>
                                        <td>email {{ $Company->email }}</td>
                                        <td>  Телефон {{ $Company->phone }}</td>
                                        <td>   Сайт {{ $Company->website }}</td>
                                        <td>
                                            @if($Company->logo!=null)
                                                <img src="{{ Storage::url($Company->logo) }}" height="40px">
                                            @else
                                                <img src="/">
                                            @endif
                                        </td>
                                    </tr>
                            <table class="table">
                                <h2>Сотрудники </h2>
                                <tbody>
                                @if(!isset($Staff))
                                            @foreach($Staff as $staf)
                                        <tr><td>{{$staf->first_name}}</td>
                                            <td>{{$staf->last_name}}</td>
                                            <td>{{$staf->company_id}}</td>
                                            <td>{{$staf->phone}}</td>
                                            <td>{{$staf->email}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('staff.destroy', $staf) }}" method="POST">
                                                        <a class="btn btn-success" type="button" href="{{ route('staff.show', $staf) }}">Открыть</a>
                                                        <a class="btn btn-warning" type="button" href="{{ route('staff.edit', $staf) }}">Редактировать</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    нет сотрудников
                                    @endif</td>
                                </tbody>
                            </table>
                        <a href="{{ route('staff.create') }}"><button type="button" class="bth btn-success">Создать нового сотрудника</button></a>
                        </div>
                    </div></div></div></div>
@endsection
