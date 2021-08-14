@extends('layouts.master')
@section('title','Создание компании')
@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="POST"  @isset($Company)
                               action="{{ route('company.update', $Company)}}"
                               @else
                               action="{{ route('company.store') }}"
                            @endisset>
                           @isset($Company)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="name" >Название компании</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $Company->name ?? old( 'name' ) }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" >Телефон компании</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $Company->phone ?? old( 'phone' ) }}">
                            </div>
                            <div class="form-group">
                                <label for="email" >Email компании</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ $Company->email ?? old( 'email' ) }}">
                            </div>
                            <div class="form-group">
                                <label for="website" >Сайт компании</label>
                                <input id="website" type="text" class="form-control" name="website" value="{{ $Company->website ?? old( 'website' ) }}">
                            </div>
                            <div class="input-group row">
                                <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-file">
                                        Загрузить <input type="file" style="display: none;" name="logo" id="logo">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control">
                                   Сохранить
                                </button>
                            </div>
                        </form>
                    </div></div></div></div></div>
@endsection





