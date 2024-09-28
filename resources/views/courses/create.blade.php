@extends('layouts.admin')

@section('content')
    <h2>Cadastrar o Curso</h2>

    <a href="{{ route('courses.index')}}" class="link-button">Listar</a><br><br>

    @if (session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
    @endif

    @if ($errors->any())
        <span style="color: red">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
    @endif

    <form action="{{ route('courses.store')}}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" value="{{old('name')}}" ><br><br>

        <label>Preço: </label>
        <input type="text" name="price" id="price" placeholder="Preço do curso" value="{{old('price')}}" ><br><br>

        <button type="submit">Cadastrar</button>


    </form>
@endsection
