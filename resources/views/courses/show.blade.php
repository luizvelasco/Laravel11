@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Curso</h2>

    <a href="{{ route('courses.index')}}" class="link-button">Listar</a><br>
    <a href="{{ route('courses.edit', ['course' => $course->id])}}" class="link-button">Editar</a><br>

    @if (session('success'))
        <p style="color: #082">
            {{ session('success') }}
        </p>
    @endif

    <div class="course-list">
        <div class="course-item">
            <h3>Curso ID: {{ $course->id }}</h3>
            <p>Nome: {{ $course->name }}</p>
            <p>Preço: {{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</p>
            <p>Criado em: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}</p>
            <p>Atualizado em: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
    
@endsection