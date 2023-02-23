@extends('apphome')

@section('title', 'Home')
@push('styles')
    <link href="{{ asset('css/home-product.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
@endpush
@section('content')
<div>
    <div class="container mt-5">
        @if ( Session::has('success') )
        <div class="alert alert-success" id="popup_notification">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="row">
            @foreach($products as $product) 
            <div class="col-md-3">
                <div class="card">
                    <div class="image-container">
                        <div class="first">                          
                            <div class="d-flex justify-content-between align-items-center">
                            <span class="discount">-15%</span>
                            <span class="wishlist"><i class="fa fa-heart-o"></i></span>                      
                            </div>
                        </div>
                        <img src="{{ $product->url_image }}" class="img-fluid rounded thumbnail-image">                   
                    </div>


                    <div class="product-detail-container p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('product.detail', $product->id) }}" class="dress-name dress">{{ $product->name }}</a>
                            <div class="d-flex flex-column mb-2">
                                <span class="new-price">{{ $product->discount }}</span>
                                <small class="old-price text-right">{{ $product->price }}</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-1">
                            <h5 class="dress-name">{{ $product->product_desc }}</h5>
                          
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-1">
                            <div>
                                <i class="fa fa-star-o rating-star"></i>
                                <span class="rating-number">Số lượng: {{ $product->amount }}</span>
                            </div>
                            <!-- <span class="buy">BUY+</span> -->
                            <form method="get" action="{{ route('cart.add', $product->id) }}">
                                <button type="submit" name="add_to_cart">Mua</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="card voutchers">
                        <div class="voutcher-divider">
                            <div class="voutcher-left text-center">
                                <span class="voutcher-name">Sunday Happy</span>
                                <h5 class="voutcher-code">#SUNHPY</h5>
                            </div>
                            <div class="voutcher-right text-center border-left">
                                <h5 class="discount-percent">15%</h5>
                                <span class="off">Off</span>                               
                            </div>                
                        </div>            
                    </div> 
                </div>                         
        </div>
    @endforeach
        </div>
    </div>
</div>
<a id="boot-icon" href="{{ route('cart.detail') }}" class="bi bi-cart" style="font-size: 55px; color: rgb(0, 0, 255); opacity: 0.9; -webkit-text-stroke-width: 1.6px; border-radius: 20px 20px 20px; position: fixed; bottom: 80px; right: 65px"></button>

@endsection

