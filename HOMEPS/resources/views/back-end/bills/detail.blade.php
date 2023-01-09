@extends('test')

@section('title', 'example')
@push('styles')
    <link href="{{ asset('css/bill-list.css') }}" rel="stylesheet"/>
@endpush
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Orders management</h1>
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
                <div>
                    <span class="me-3">{{ $order->created_at }}</span>
                    <span class="me-3">#{{ $order->id }}</span>
                </div>
            </div>
            <h3>Product order</h3>
            <table class="table table-borderless">
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                <img src="{{ $product->url_image }}" alt="" width="35" class="img-fluid">
                                </div>
                                <div class="flex-lg-grow-1 ms-3">
                                <h6 class="small mb-0"><a href="#" class="text-reset">{{ $product->name}}</a></h6>
                                </div>
                            </div>
                            </td>
                            <td>{{ $product->amount }}</td>
                            <td class="text-end">Price: {{ $product->price * $product->amount }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                <tr class="fw-bold">
                    <td colspan="2">subtotal</td>
                    <td class="text-end">{{ $order->amount($order) }}</td>
                </tr>
                </tfoot>
            </table>
            <h3>Computer usage time</h3>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                        <div class="d-flex mb-2">
                            <div class="flex-lg-grow-1 ms-3">
                            <h6 class="small mb-0"><a href="#" class="text-reset">{{ $order->pc[0]->name}}</a></h6>
                            </div>
                        </div>
                        </td>
                        <td class="text-end">Price: {{ $order->amountTimeUse($order)}}</td>
                    </tr>
                </tbody>
                <tfoot>
                <tr class="fw-bold">
                    <td colspan="2">subtotal</td>
                    <td class="text-end">{{ $order->amountTimeUse($order)}}</td>
                </tr>
                <tr class="fw-bold">
                    <td colspan="2">TOTAL</td>
                    <td class="text-end">{{ $order->amountTimeUse($order) + $order->amount($order) }}</td>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
@endsection