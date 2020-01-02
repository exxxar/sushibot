@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Добавление нового ингридиента</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('ingredients.index') }}"> Назад</a>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger mt-2">
                                <strong>Упс!</strong> Возникли ошибки при заполнении полей.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    </div>
                </div>


                <form method="post" action="{{ route('ingredients.store') }}">
                    @csrf
                    <table class="table mt-2">
                        <thead class="thead-light ">
                        <th>Параметр</th>
                        <th>Значение</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Title</td>
                            <td>
                                <input type="text" name="title" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Mass</td>
                            <td>
                                <input type="text" name="mass" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Quantity</td>
                            <td>
                                <input type="number" name="quantity" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="number" name="price" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>Use type</td>
                            <td>
                                <select name="use_type" id="use_type">
                                    @foreach(\App\Enums\UseIngredientType::getInstances() as $ingrType)
                                        <option value="{{$ingrType->value}}">{{$ingrType->key}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-primary">Добавить</button>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection