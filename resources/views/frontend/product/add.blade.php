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
</head>
<body>
    @include('frontend.layouts.header')

    @include('frontend.layouts.slide')
    
    <section>
        <div class="container">
            <div class="row">
                

                <div class="col-sm-9 padding-right">
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
                            <h3>Create Product</h3>
                            <hr>
                            <form class="form-horizontal form-material" enctype="multipart/form-data" action="" method="POST">
                                <div>
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name..." value="{{old('name')}}"> <br>
                                        @error('name') 
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price" placeholder="Price..." value="{{old('price')}}"> <br>
                                        @error('price') 
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" class="form-control form-control-line">
                                            @if (!empty($category))
                                                @foreach ($category as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                            <br>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="brand_id" class="form-control form-control-line">
                                            @if (!empty($brand))
                                                @foreach ($brand as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                            <br>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control form-control-line">
                                            <option value="1">New</option>
                                            <option value="0">Sale</option>
                                            <br>
                                        </select>
                                    </div>
                                    <div id="sale" class="form-group" style="display: none;">
                                        <div class="col-md-4">
                                            <input type="text" name="sale" placeholder="0" id="sale" value="{{old('sale')}}">
                                            <span>%</span> 
                                        </div>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="company" placeholder="Company profile..." value="{{old('company')}}"> <br>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="hinhanh" name="hinhanh[]" multiple accept="hinhanh/*" max="3" class="form-control form-control-line"><br>
                                        <!-- <input type="file" name="hinhanh" class="form-control form-control-line" value=""> <br> -->
                                        @error('hinhanh') 
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="detail" placeholder="Detail..." cols="30" rows="10" value="{{old('detail')}}"></textarea> <br>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="ADD">
                                        <a href="{{route('product.list')}}"><input type="button" value="QUAY LẠI"></a>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
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

    <script>
            var statusSelect = document.getElementById('status');
            var saleDiv = document.querySelector('#sale');

            statusSelect.addEventListener('change', function() {
                if (this.value == '0') {
                    saleDiv.style.display = 'block';
                } else {
                    saleDiv.style.display = 'none';
                }
            });
    </script>

</body>
</html>