<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Task Checklist</title>

    <style>
        .flash-message {
            position: fixed;
            top: 5px;
            right: 5px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        @yield('content')

        <div class="flash-message">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const flashMessage = document.querySelector('.flash-message');
                if (flashMessage) {
                    flashMessage.style.transition = 'opacity 0.5s ease';
                    flashMessage.style.opacity = '0';
                    setTimeout(() => {
                        flashMessage.style.display = 'none';
                    }, 500);
                }
            }, 3000);
        });
    </script>

    @yield('scripts')

</body>

</html>
