@extends('layouts.admin')

@section('content')
    <h2>Listar Cursos</h2>

    <a href="{{ route('courses.create')}}" class="link-button">Cadastrar</a><br>

    <x-alert />

    {{-- Imprimir os registros --}}
    <div class="course-list">
        @forelse ($courses as $course)
            <div class="course-item">
                <h3>Curso ID: {{ $course->id }}</h3>
                <p>Nome: {{ $course->name }}</p>
                <p>Preço: {{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</p>
                <p>Criado em: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}</p>
                <p>Atualizado em: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}</p>

                <div class="button-group">
                    <a href="{{ route('courses.show', ['course' => $course->id ])}}" class="link-button">Visualizar</a>
                    <a href="{{ route('courses.edit', ['course' => $course->id ])}}" class="link-button">Editar</a>
                    
                    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST" class="inline-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="link-button delete-button" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="empty-message">Nenhum curso encontrado!</p>
        @endforelse
    </div>

    {{-- Imprimir a paginação --}}
    {{-- {{ $courses->links() }} --}}
@endsection
