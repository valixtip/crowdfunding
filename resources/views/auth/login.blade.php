@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center py-4 ">
        <main class="form-signin m-auto d-flex p-3 flex-column" >
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="text" id="name" class="form-control"  placeholder="name@example.com" name="name" required>
                    <label for="name">Username</label>
                </div><br>
                <div class="form-floating">
                    <input type="password" id="password" class="form-control"  name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div><br>
                <button class="btn btn-primary w-100 py-2" type="submit">Log in</button>
            </form>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
@endsection
