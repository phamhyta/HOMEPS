@extends('app')

@section('title', 'example')
@push('styles')
<link href="{{ asset('css/bill-list.css') }}" rel="stylesheet" />
@endpush
@section('content')
<h1 class="h3 mb-2 text-gray-800">Orders management</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Orders</h6>
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
                        <td>{{ $order->amount ?? $order->amount($order) + $order->amountTimeUse($order) }}</td>
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
                            <a href="{{ route('admin.bill.detail', $order ->id) }}" class="btn btn-outline-primary mr-2"><i class="fas fa-info-circle mt-0 mr-2"></i> More information</a>
                            <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#updateModal{{ $order->id }}"><i class="fas fa-pencil-alt mt-0 mr-2"></i>Update</button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal{{ $order->id }}"><i class="far fa-trash-alt mt-0 mr-2"></i> Delete</button>
                            <!-- Modal -->
                            <div class="modal fade" id="updateModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel{{ $order->id }}">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.bill.update') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                Status:
                                                <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                                                <input type="radio" class="btn-check" id="btn-check" name="status" value="1" autocomplete="off" />
                                                <label class="btn btn-primary" for="btn-check">{{ $order->getRoleName(1) }}</label>
                                                <input type="radio" class="btn-check" id="btn-check" name="status" value="2" autocomplete="off" />
                                                <label class="btn btn-primary" for="btn-check2">{{ $order->getRoleName(2) }}</label>
                                                <input type="radio" class="btn-check" id="btn-check" name="status" value="3" checked autocomplete="off" />
                                                <label class="btn btn-primary" for="btn-check3">{{ $order->getRoleName(3) }}</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $order->id }}">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.bill.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection