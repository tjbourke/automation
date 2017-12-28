<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ (isset($title) && !is_null($title)) ? $title : config('app.name') }}</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('styles')

    <script>
        window.APP_ENV = '{{ env('APP_ENV') }}';
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>;
    </script>
</head>
<body>
    @yield('html')
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>