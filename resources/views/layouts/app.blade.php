@extends('layouts.base')

@section('body')
    <x-layouts.navigation></x-layouts.navigation>
    <main class="py-4">
        @yield('content')
    </main>
@endsection