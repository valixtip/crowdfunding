@extends('layouts.app')

@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Звіт про всі проекти</h1>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('projects.index', ['filter' => 'all']) }}" class="btn btn-primary">Всі проекти</a>
                    <a href="{{ route('projects.index', ['filter' => 'completed']) }}" class="btn btn-success">Готові проекти</a>
                    <a href="{{ route('projects.index', ['filter' => 'incomplete']) }}" class="btn btn-warning">Не готові проекти</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container" bis_skin_checked="1">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" bis_skin_checked="1">
            @foreach ($projects as $project)
            <div class="col" bis_skin_checked="1">
                <div class="card shadow-sm" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <h2>{{ $project->title }}</h2>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text">Статус: {{ ($project->status) }}</p>
                        <p class="card-text">Цільова сума: ${{ number_format($project->goal_amount, 2) }}</p>
                        <p class="card-text">Наявна сума: ${{ number_format($project->current_amount, 2) }}</p>

                        <h3>Спонсори</h3>
                        @if ($project->donations->count() > 0)
                            @foreach ($project->donations as $donation)
                                <div>
                                            <p>Ім'я спонсора: {{ $donation->user->name }}</p>
                                            <p>Сума донату: ${{ number_format($donation->amount, 2) }}</p>
                                            <p>Коментар: {{ $donation->comment }}</p>
                                            <p>Час донату: {{ $donation->created_at }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Спонсорів поки що немає.</p>
                                @endif

                                <h3>Звіти</h3>
                                @if ($project->reports->count() > 0)
                                    @foreach ($project->reports as $report)
                                        <div>
                                            <p>Текст звіту: {{ $report->text }}</p>
                                            <p>Автор: {{ $report->user->name }}</p>
                                            <p>Час створення: {{ $report->created_at }}</p>
                                            @if ($report->photo)
                                                <img src="{{ asset('storage/' . $report->photo) }}" alt="Фото звіту" width="200">
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <p>Звітів поки що немає.</p>
                                @endif
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info mt-3">Продивитися більше</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

