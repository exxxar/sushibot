@extends('layouts.app')

@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{route("promocodes.create")}}">Новый промокод</a>
                    </div>
                </div>

                <h1>Акции</h1>
                @isset($promocodes)
                    <table class="table mt-2">

                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Код</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Действие</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promocodes as $key => $promocode)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td><a href="{{ route('promocodes.show',$promocode->id) }}">
                                        {{$promocode->code}}</a>
                                    <a class="btn btn-link" href="{{ route('promocodes.edit',$promocode->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                                <td>{{$promocode->activated?"Активирован":"Не активирован"}}</td>
                                <td>
                                    <a href="{{$promocode->user->id}}">{{$promocode->user->email}}</a>
                                </td>

                                <td>
                                    <form action="{{ route('promocodes.destroy', $promocode->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link" type="submit"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $promocodes->links() }}
                @endisset
            </div>
        </div>
    </div>
@endsection