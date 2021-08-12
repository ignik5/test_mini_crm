@extends('layouts.master')
@section('title','Сотрудники')
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
                                        Имя
                                    </th>
                                    <th>
                                        Фамилия
                                    </th>
                                    <th>
                                        Работает в компании
                                    </th>
                                    <th>
                                        Телефон
                                    </th>
                                    <th>
                                        email
                                    </th>

                                    <th>
                                        Действия
                                    </th>
                                </tr>
                                @foreach($Staff as $Staf)
                                    <tr>
                                        <td>{{ $Staf->id }}</td>
                                        <td>{{ $Staf->first_name }}</td>
                                        <td>{{ $Staf->last_name }}</td>
                                        <td>@if(isset($Staf->company()->name))
                                          {{ $Staf->company()->name }}
                                               @else
                                                нет копмании
                                          @endif</td>
                                        <td>{{ $Staf->phone }}</td>
                                        <td>{{ $Staf->email }}</td>
                                        {{--   // 'logo'--}}
                                        <td>

                                            <div class="btn-group" role="group">
                                                <form action="{{ route('staff.destroy', $Staf) }}" method="POST">
                                                    <a class="btn btn-success" type="button" href="{{ route('staff.show', $Staf) }}">Открыть</a>
                                                    <a class="btn btn-warning" type="button" href="{{ route('staff.edit', $Staf) }}">Редактировать</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <a href="{{ route('staff.create') }}"><button type="button" class="bth btn-success">Создать нового сотрудника</button></a>

                        </div>
                    </div></div></div></div>
@endsection
