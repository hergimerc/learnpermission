@extends('layouts.back')

@section('main')
    <div class="card">
        <div class="card-header">Your Dashboard</div>
        <div class="card-body">
            Hi {{ auth()->user()->name }}
        </div>
    </div>
@endsection