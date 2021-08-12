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


                                <table class="table">
                                    <h2>Сотрудник </h2>
                                    <tbody>

                                        <tr><td>{{$Staff->first_name}}</td>
                                            <td>{{$Staff->last_name}}</td>
                                            <td>@if(isset($Staff->company()->name))
                                                    {{ $Staff->company()->name }}
                                                @else
                                                    нет копмании
                                                @endif</td>
                                            <td>{{$Staff->phone}}</td>
                                            <td>{{$Staff->email}}</td>
                                            <td>

                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('staff.destroy', $Staff) }}" method="POST">
                                                        <a class="btn btn-success" type="button" href="{{ route('staff.show', $Staff) }}">Открыть</a>
                                                        <a class="btn btn-warning" type="button" href="{{ route('staff.edit', $Staff) }}">Редактировать</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                                </div>
                                            </td>
                                        </tr>

                                    {{--   // 'logo'--}}

                                        </tr>

                                    </tbody>

                                </table>
                                <a href="{{ route('staff.create') }}"><button type="button" class="bth btn-success">Создать нового сотрудника</button></a>

                        </div>
                    </div></div></div></div>
@endsection
