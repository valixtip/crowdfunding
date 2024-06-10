@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="fw-light">{{ $project->title }}</h1>
        <p><strong>Опис проекту:</strong> {{ $project->description }}</p>
        <p><strong>Статус:</strong> {{ $project->status }}</p>
        <p><strong>Цільова сума:</strong> ${{ number_format($project->goal_amount, 2) }}</p>
        <p><strong>Наявна сума:</strong> ${{ number_format($project->current_amount, 2) }}</p>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @auth
            <div class="d-flex align-items-center py-4">
                <main class="form-signin w-50 m-auto">
                    <div class="container py-5">
                        <h2>Внести донат</h2>
                        <form action="{{ route('donations.store', $project) }}" method="POST">
                            @csrf
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="amount">Сума (USD):</span>
                                <input type="number" class="form-control" name="amount" aria-label="amount" aria-describedby="amount" required min="1">
                            </div><br>
                            <div class="form-floating">
                                <textarea class="form-control" id="comment" name="comment"></textarea>
                                <label for="comment">Коментар:</label>
                            </div><br>
                            <button class="btn btn-success w-100 py-2" type="submit">Задонатити</button>
                        </form>
                    </div>
                </main>
            </div>

            @if (Auth::id() === $project->user_id)
                <div class="d-flex align-items-center py-4">
                    <main class="form-signin w-50 m-auto">
                        <div class="container py-5">
                            <h2>Додати звіт</h2>
                            <form action="{{ route('reports.store', $project) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating">
                                    <textarea class="form-control" id="text" name="text" required></textarea>
                                    <label for="text">Текст звіту:</label>
                                </div><br>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="photo">Фото (необов'язково):</span>
                                    <input type="file" class="form-control" name="photo" aria-label="photo" aria-describedby="photo">
                                </div><br>
                                <button class="btn btn-success w-100 py-2" type="submit">Додати звіт</button>
                            </form>
                        </div>
                    </main>
                </div>
            @endif
        @endauth

        @guest
            <p>Будь ласка, <a href="{{ route('login') }}">увійдіть</a> для внесення донатів та додавання звітів.</p>
        @endguest

        <div class="d-flex align-items-center py-4">
            <main class="form-signin w-50 m-auto">
                <div class="col" bis_skin_checked="1">
                    <div class="card shadow-sm" bis_skin_checked="1">
                        <h2>Донати</h2>
                        @foreach ($project->donations as $donation)
                            <div>
                                <p><strong>Користувач: </strong> {{ $donation->user->name }}</p>
                                <p><strong>Сума: </strong> ${{ number_format($donation->amount, 2) }}</p>
                                <p><strong>Коментар: </strong> {{ $donation->comment }}</p>
                                <p><strong>Час: </strong> {{ $donation->created_at }}</p>
                            </div>
                        @endforeach

                        <h2>Звіти</h2>
                        @foreach ($project->reports as $report)
                            <div>
                                <p><strong>Користувач: </strong>{{ $report->user->name }}</p>
                                <p><strong>Коментар: </strong>{{ $report->text }}</p>
                                <p><strong>{{ $report->created_at }}</strong></p>
                                @if ($report->photo)
                                    <img src="{{ asset('storage/' . $report->photo) }}" alt="Фото звіту" width="200">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection
