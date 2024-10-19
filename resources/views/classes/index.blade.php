@extends('layouts.admin')

@section('content')

    <h2>Listar as aulas</h2>

    <a href="{{ route('course.index')}}" class="link-button">Cursos</a><br>
    <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="link-button">Cadastrar</a><br>

    <x-alert />

    @forelse ($classes as $classe)
        ID: {{ $classe->id }} <br><br>
        Nome: {{ $classe->name }} <br><br>
        Ordem: {{ $classe->order_classe }} <br><br>
        Descrição: {{ $classe->description }} <br><br>
        Curso: {{ $classe->course->name }} <br><br>
        Criado em: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado em: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}<br>
        
    @empty
        <p class="empty-message">Nenhuma aula encontrada!</p>
    @endforelse

@endsection