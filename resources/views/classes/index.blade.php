@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Aula</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Aulas</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-header hstack gap-2">
            <span>Listar</span>
            <span class="ms-auto">
                <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="btn btn-success btn-sm">Cadastrar</a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ordem</th>
                        <th>Descrição</th>
                        <th>Curso</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $classe)
                        <tr>
                            <th>{{ $classe->name }}</th>
                            <th>{{ $classe->order_classe }}</th>
                            <th>{{ $classe->description }}</th>
                            <th>{{ $classe->course->name }}</th>
                            <td class="d-md-flex flex-row justify-content-center">
                                <a href="{{ route('classe.show', ['classe' => $classe->id ])}}" class="btn btn-info btn-sm me-1 mt-1 mt-md-0">Visualizar</a>
                                <a href="{{ route('classe.edit', ['classe' => $classe->id ])}}" class="btn btn-primary btn-sm me-1 mt-1 mt-md-0">Editar</a>
                                
                                <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1 mt-1 mt-md-0" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
                                </form>
                            </td> 
                        </tr>
                    @empty
                    <div class="alert alert-danger" role="alert">
                        Nenhuma aula encontrada!
                    </div>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</div>
{{-- Imprimir a paginação --}}
{{-- {{ $courses->links() }} --}}
@endsection



{{-- @extends('layouts.admin')

@section('content')

    <h2>Listar as aulas</h2>

    <a href="{{ route('course.index')}}" class="link-button">Cursos</a><br>
    <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="link-button">Cadastrar</a><br>

    <x-alert />

    <div class="course-list">
        @forelse ($classes as $classe)
            <div class="course-item">
                <p>Nome: {{ $classe->name }} </p>
                <p>Ordem: {{ $classe->order_classe }} </p>
                <p>Descrição: {{ $classe->description }} </p>
                <p>Curso: {{ $classe->course->name }}</p> 
                <p>Criado em: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</p>
                <p>Atualizado em: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</p>
            </div>

            <div class="button-group">
                <a href="{{ route('classe.show', ['classe' => $classe->id ])}}" class="link-button">Visualizar</a>
                <a href="{{ route('classe.edit', ['classe' => $classe->id ])}}" class="link-button">Editar</a>
                
                <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('delete')
                    <button type="submit" class="link-button delete-button" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
                </form>
            </div>
        @empty
            <p class="empty-message">Nenhuma aula encontrada!</p>
        @endforelse
    </div>

@endsection --}}