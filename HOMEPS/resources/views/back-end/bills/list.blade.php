@extends('test')

@section('title', 'example')
@push('styles')
    <link href="{{ asset('css/bill-list.css') }}" rel="stylesheet"/>
@endpush
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Orders management</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PC</th>
                            <th>Total amount</th>
                            <th>Status</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->pc[0]->name }}</td>
                                <td>{{ $order->amount($order) + $order->amountTimeUse($order)}}</td>
                                <td>
                                    @if($order->status == 1)
                                        <button class="btn btn-secondary">{{ $order->getRoleName($order->status) }}</button>
                                    @elseif($order->status == 2)
                                        <button class="btn btn-warning">{{ $order->getRoleName($order->status) }}</button>
                                    @else
                                        <button class="btn btn-success">{{ $order->getRoleName($order->status) }}</button>
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary mr-2">More information</a>
                                    <a href="" class="btn btn-outline-success mr-2">Update</a>
                                    <a href="" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection