@extends('app')

@section('title', 'Home')
@push('styles')
    <link href="{{ asset('css/home-product.css') }}" rel="stylesheet"/>
@endpush
@section('content')
<div class="col-md-3">
                <div class="card">
                    <div class="image-container">
                        <div class="first">                          
                            <div class="d-flex justify-content-between align-items-center">
                            <span class="discount">-25%</span>
                            <span class="wishlist"><i class="fa fa-heart-o"></i></span>                      
                            </div>
                        </div>
                        <img src="https://cdn.shopify.com/s/files/1/0563/5745/4002/products/141_1.png?v=1623399805" class="img-fluid rounded thumbnail-image">                   
                    </div>


                    <div class="product-detail-container p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="dress-name">Cápog</a>
                                <div class="d-flex flex-column mb-2">
                                    <span class="new-price">150</span>
                                    <small class="old-price text-right">200</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <h5 class="dress-name">chạy vẫn chưa êm lắm nhưng mà tạm đc rồi</h5>
                          
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <div>
                                    <i class="fa fa-star-o rating-star"></i>
                                    <span class="rating-number">Số lượng: 150</span>
                                </div>
                                <span class="buy">BUY +</span>                               
                            </div>                   
                    </div>                  
                </div>

                <div class="mt-3">
                    <div class="card voutchers">
                        <div class="voutcher-divider">
                            <div class="voutcher-left text-center">
                                <span class="voutcher-name">Monday Happy</span>
                                <h5 class="voutcher-code">#MONHPY</h5>
                            </div>

                            <div class="voutcher-right text-center border-left">
                                <h5 class="discount-percent">20%</h5>
                                <span class="off">Off</span>                               
                            </div>                
                        </div>            
                    </div> 
                </div>                         
        </div>
@endsection
