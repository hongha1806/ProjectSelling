<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
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
                <form class="form-horizontal form-material" enctype="multipart/form-data" action="" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control form-control-line" value="{{ Auth::user()->name }}">
                                @error('name') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" disabled  class="form-control form-control-line" name="email" id="example-email" value="{{Auth::user()->email}}">
                                @error('email') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" value="password" class="form-control form-control-line" value="{{Auth::user()->password}}">
                                @error('password') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name="phone" class="form-control form-control-line" value="{{Auth::user()->phone}}">
                                @error('phone') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Address</label>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control form-control-line" value="{{ Auth::user()->address }}">
                                @error('address') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Avatar</label>
                            <div class="col-md-12">
                                <img src="upload/user/avatar/{{ Auth::user()->avatar }}" alt="" width="100" height="100">
                            </div>
                            <div class="col-md-12">
                                <input type="file" name="avatar" class="form-control form-control-line" value="upload/user/avatar/{{ Auth::user()->avatar }}">
                                @error('avatar') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select name="id_country" class="form-control form-control-line">
                                            @if (!empty($countryList))
                                                @foreach ($countryList as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-default">Update</button>
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