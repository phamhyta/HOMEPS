@extends('app')

@section('title', 'Bills')
@push('styles')
<link href="{{ asset('css/bill-list.css') }}" rel="stylesheet"/>
@endpush
@section('content')
<div>
    <h3>Bills Manager</h3>
    <div class="d-flex justify-content-between">
        <div class="px-5 w-25"></div>
        <div class="px-5 w-50">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="col-sm-1" scope="col">ID</th>
                    <th class="col-sm-1" scope="col">ID PC</th>
                    <th class="col-sm-2" scope="col">Product name</th>
                    <th class="col-sm-2" scope="col">Price</th>
                    <th class="col-sm-2" scope="col">Status</th>
                    <th class="col-sm-2" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i <= 10; $i++)
                        <tr>
                            <th class="col-sm-1" scope="row">1</th>
                            <td class="col-sm-1">PC01</td>
                            <td class="col-sm-2">Otto</td>
                            <td class="col-sm-2">@mdo</td>
                            <td class="col-sm-2">Complited</td>
                            <td class="col-sm-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                                <i class="bi bi-x-circle-fill"></i>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="px-5 w-25">
            <img src="" alt="">
        </div>
    </div>
</div>

@endsection