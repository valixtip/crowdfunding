<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../js/styles.css">
    <title>Crowdfunding Platform</title>
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Home</a></li>
            </ul>

            @if(Auth::check())
                <div class="dropdown text-end col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownMenuButton">
                        @if(Auth::check())
                            <li><a href="{{ route('projects.create') }}" class="dropdown-item">New Project</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            @endif

            <div class="text-end">
                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                @endif
            </div>

        </div>
    </div>
</header>

<div class="content">
    @yield('content')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownToggle = document.getElementById('dropdownMenuButton');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        function closeDropdown() {
            dropdownMenu.classList.remove('show');
            dropdownToggle.setAttribute('aria-expanded', 'false');
        }

        function handleDocumentClick(event) {
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                closeDropdown();
            }
        }

        dropdownToggle.addEventListener('click', function (event) {
            if (dropdownMenu.classList.contains('show')) {
                closeDropdown();
            } else {
                dropdownMenu.classList.add('show');
                dropdownToggle.setAttribute('aria-expanded', 'true');
            }
            event.stopPropagation();
        });

        document.addEventListener('click', handleDocumentClick);
    });
</script>
</body>
</html>
