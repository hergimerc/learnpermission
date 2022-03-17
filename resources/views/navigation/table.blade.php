@extends('layouts.back')

@section('main')
    <div class="card">
        <div class="card-header">Data Table Navigation</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Permission Name</th>
                </tr>
                @foreach ($navigations as $navigation)
                    <tr>
                        <td><strong>{{ $navigation->parent->name }}</strong></td>
                        <td>{{ $navigation->name }}</td>
                        <td>{{ $navigation->url ?? "it's parent" }}</td>
                        <td>{{ $navigation->permission_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection