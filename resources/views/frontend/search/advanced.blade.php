<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search advanced</title>
    <style>
        .one{
           display: flex;
           
        }


    </style>
</head>
<body>
    @extends('frontend.layouts.app')
    @section('content')
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            
            @if (session('msg'))
                <div style="color: red;">{{session('msg')}}</div>
            @endif
            <div>
                
                @if ($products)
                    @foreach ($products as $item)
                        @php
                            $images = json_decode($item->hinhanh);
                        @endphp
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('upload/product/'.$images[0]) }}" alt="" />
                                            <h2>{{$item->price}}</h2>
                                            <p>{{$item->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <a href="{{route('productdetail', ['id'=>$item->id])}}"><h2>{{$item->price}}</h2></a>
                                                <a href="{{route('productdetail', ['id'=>$item->id])}}"><p>{{$item->name}}</p></a>
                                                <a href="#" class="btn btn-default add-to-cart" id="{{$item->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                
                    @endforeach
                   
                
            </div>
                    @if ($x == 1)
                        {{ $products->links() }}
                    @endif
                @endif
        </div>
    @endsection
</body>
</html>