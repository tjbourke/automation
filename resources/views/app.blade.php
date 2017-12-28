@extends('html', ['title' => isset($title) ? $title : null, 'jsViewPath' => isset($jsViewPath) ? $jsViewPath : ''])

@section('html')
    <a id="top"></a>
    <div id="app">
        @yield('body')
    </div>
@endsection