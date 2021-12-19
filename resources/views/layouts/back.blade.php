@extends('layouts.base')

@section('body')
    <div class="container-fluid">
        <div class="py-2">
            <div class="row">
                <div class="col-md-3">
                    <x-layouts.sidebar></x-layouts.sidebar>
                </div>
                <div class="col-md-9">
                    <div class="mt-4">
                        @yield('main')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection