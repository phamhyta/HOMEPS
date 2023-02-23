@extends('app')

@section('title', 'example')
@push('styles')
    <link href="{{ asset('css/bill-list.css') }}" rel="stylesheet"/>
@endpush
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Admin List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Admins</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ( Session::has('success') )
                    <div class="alert alert-success" id="popup_notification">
                        {{ Session::get('success') }}
                    </div>      
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DoB</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->first_name }}</td>
                                <td>{{ $admin->last_name }}</td>
                                <td>{{ $admin->birthday }}</td>
                                <td>{{ $admin->email }}</td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection