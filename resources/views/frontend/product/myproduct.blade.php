<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myproduct</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!-- [if lt IE 9]>
    <script src="frontend/js/html5shiv.js"></script>
    <script src="frontend/js/respond.min.js"></script>
    <![endif]        -->
    <link rel="shortcut icon" href="frontend/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <style>
        .them{
            background-color: orange;
            color: white;
        }
    </style>
</head>
<body>
    @include('frontend.layouts.header')

    @include('frontend.layouts.slide')
    
    <section>
        <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Account</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('account')}}"><i class="fa fa-user"></i> Account</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('product.list')}}"><i class="fa fa-shopping-cart"></i> My product</a></h4>
                            </div>
                        </div>
                        
                    </div><!--/category-products-->
                
                    
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7 col-sm-4">
                <div class="card signup-form">
                    <div class="card-body">
                        @if (session('msg'))
                            <div style="color: red;">{{session('msg')}}</div>
                        @endif

                        @if ($errors->any())
                            <div style="color: red;">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
                        @endif
                    <hr/>
                    <div class="col-sm-9">
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <th scope="col" width="5%">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">IMAGE</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">EDIT</th>
                                        <th scope="col">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($products))
                                        @foreach ($products as $item)
                                            @php
                                                $images = json_decode($item->hinhanh);
                                            @endphp
                                            <tr>
                                                <td scope="row">{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>
                                                    <img src="{{ asset('upload/product/'.$images[0]) }}" alt="" width="30">
                                                </td>
                                                <td>{{$item->price}}</td>
                                                <td ><a href="{{route('product.edit', ['id'=>$item->id])}}">Edit</a></td>
                                                <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa product?')" 
                                                href="{{route('product.delete', ['id'=>$item->id])}}">Delete</a></td>
                                            </tr>
                                         @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">There is no product</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                        <a href="{{route('product.add')}}"><button class="them">Add product</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>