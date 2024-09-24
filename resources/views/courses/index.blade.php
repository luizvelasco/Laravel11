@extends('layouts.admin')

@section('content')
    <h2>Listar Cursos</h2>

    <a href="{{ route('courses.show')}}" class="link-button">Visualizar</a><br>
    <a href="{{ route('courses.create')}}" class="link-button">Cadastrar</a><br>

    {{-- Imprimir os registros --}}
    <div class="course-list">
        @forelse ($courses as $course)
            <div class="course-item">
                <h3>Curso ID: {{ $course->id }}</h3>
                <p>Nome: {{ $course->name }}</p>
                <p>Criado em: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}</p>
                <p>Atualizado em: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}</p>
                <hr>
            </div>
        @empty
            <p class="empty-message">Nenhum curso encontrado!</p>
        @endforelse
    </div>

    {{-- Imprimir a paginação --}}
    {{-- {{ $courses->links() }} --}}
@endsection

