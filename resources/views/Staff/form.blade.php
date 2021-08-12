@extends('layouts.master')
@section('title','создание Компании')

@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="POST"  @isset($Staff)

                        action="{{ route('staff.update', $Staff)}}"

                               @else
                               action="{{ route('staff.store') }}"


                            @endisset>
                            @isset($Staff)
                                @method('PUT')
                            @endisset
                            @csrf


                            <div class="form-group">
                                <label for="first_name" >Имя сотрудника</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $Staff->first_name ?? old( 'first_name' ) }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name" >Фамилия сотрудника</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $Staff->last_name ?? old( 'last_name' ) }}">
                            </div>
                                <div class="form-group">
                                    <label for="company">Работает в компании</label>
                                    <select id="company" class="form-control" name="company_id">
                                        @foreach($Companies as $Company)
                                            <option value="{{ $Company->id ?? 'ytn' }}"
                                                    @isset($Staf)
                                                    @if($Staf->Company_id == $Company->id)
                                                    selected
                                                @endif
                                                @endisset
                                            >{{ $Company->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="phone" >Телефон</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $Staff->phone ?? old( 'phone' ) }}">
                            </div>
                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $Staff->email ?? old( 'email' ) }}">
                                </div>

                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    Сохранить
                                </button>
                            </div>
                        </form>

                    </div></div></div></div></div>
@endsection





