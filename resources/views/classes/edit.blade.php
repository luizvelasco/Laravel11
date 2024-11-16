@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Aula</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="text-decoration-none">Aulas</a>
            </li>
            <li class="breadcrumb-item active">Curso</li>
        </ol>
    </div>

    <div class="card mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Editar</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Aulas</a>
                <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-eye"></i> Visualizar</a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />

            <form class="row g-3" action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="course" class="form-label">Curso</label>
                    <input type="text" name = "course" class="form-control" id="course"  value="{{ $classe->course->name }}" disabled >
                </div>
                <div class="col-12">
                    <label for="name" class="form-label">Aula</label>
                    <input type="text" name = "name" class="form-control" id="name" placeholder="Nome da aula" value="{{old('name', $classe->name)}}">
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Descrição da aula" >{{old('name', $classe->description)}}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                  </div>
            </form>
            
        </div>
    </div>


</div>

@endsection
