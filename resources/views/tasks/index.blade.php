@extends('tasks.layout')

@section('title', 'Lista de Tareas')

@section('content')
    <div class="container mt-4">
        <h1>Lista de Tareas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Usuario</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr class="{{ $task->completed ? 'table-success' : '' }}">
                        <th scope="row">{{ $task->id }}</th>
                        <td><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if($task->user)
                                {{ $task->user->name }}
                            @else
                                <span class="text-danger">Sin usuario</span>
                            @endif
                        </td>
                        <td>{{ $task->priority }}</td>
                        <td>
                            @auth
                                @if ($task->completed)
                                    <span class="badge bg-success">Completada</span>
                                @else
                                    <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary btn-sm">Marcar como completada</button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
