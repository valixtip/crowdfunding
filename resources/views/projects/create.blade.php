@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center py-4 ">
    <main class="form-signin w-50 m-auto" >
        <form method="POST" action="{{ route('projects.store') }}">
            <br> <h1 class="h4 mb-5 fw-normal text-center">Створити проект</h1><br>
            @csrf
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="info">Назва проекту:</span>
                <input type="text" class="form-control" name="title" aria-label="title" aria-describedby="title" required>
            </div><br>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="description">Опис проекту:</span>
                <input type="text" class="form-control" name="description" aria-label="description" aria-describedby="description" required>
            </div><br>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="goal_amount">Цільова сума (USD):</span>
                <input type="number" class="form-control" name="goal_amount" aria-label="goal_amount" step="0.01" aria-describedby="goal_amount" required>
            </div><br>
            <button class="btn btn-success w-100 py-2" type="submit">Створити проект</button>
        </form>
    </main>
</div>
@endsection
