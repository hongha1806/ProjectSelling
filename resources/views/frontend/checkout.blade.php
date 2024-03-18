<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
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
    <section id="cart_items">
		<div class="container">

			<div class="shopper-informations">
				<div class="row">
					@auth
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								
								<input  disabled  type="text" placeholder="Name" value="{{Auth::user()->name}}">
								<input  disabled  type="text" placeholder="Email" value="{{Auth::user()->email}}">
								<input  disabled  type="text" placeholder="Phone" value="{{Auth::user()->phone}}">
								<input  disabled  type="text" placeholder="Address" value="{{Auth::user()->address}}">
							</form>
						</div>
					</div>
					@else
					<div class="col-sm-3">
						<div class="shopper-info">
							<form class="form-horizontal form-material" id="dangnhap" enctype="multipart/form-data" action="{{url('/dangnhapck')}}" method="POST">
								<p>Đăng nhập để mua hàng</p>
								<div class="form-group email">
									<label for="example-email" class="col-md-12">Email</label>
									<div class="col-md-12 maill">
										<input type="email" class="form-control form-control-line" name="email" id="example-email" value="">
										@error('email') 
											<span style="color: red;">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="form-group pass">
									<label class="col-md-12">Password</label>
									<div class="col-md-12 password">
										<input type="password" name="password" class="form-control form-control-line" value="">
										@error('password') 
											<span style="color: red;">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button class="btn btn-success btn-default login">Login</button>
									</div>
								</div>
								@csrf
							</form>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<div class="form-one">
								<form class="form-horizontal form-material" id="dangki" enctype="multipart/form-data" action="{{url('/dangkick')}}" method="POST">
									<p>Đăng kí để mua hàng</p>
									<div class="form-group">
										<label class="col-md-12">Full Name</label>
										<div class="col-md-12">
											<input type="text" name="name" class="form-control form-control-line" value="">
											@error('name') 
												<span style="color: red;">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label for="example-email" class="col-md-12">Email</label>
										<div class="col-md-12">
											<input type="email"  class="form-control form-control-line" name="email" id="example-email" value="">
											@error('email') 
												<span style="color: red;">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Password</label>
										<div class="col-md-12">
											<input type="password" name="password" class="form-control form-control-line" value="">
											@error('password') 
												<span style="color: red;">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Phone No</label>
										<div class="col-md-12">
											<input type="text" name="phone" class="form-control form-control-line" value="">
											@error('phone') 
												<span style="color: red;">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Address</label>
										<div class="col-md-12">
											<input type="text" name="address" class="form-control form-control-line" value="">
											@error('address') 
												<span style="color: red;">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Avatar</label>
										<div class="col-md-12">
											<input type="file" name="avatar" class="form-control form-control-line" value="">
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
											<button class="btn btn-success btn-default register">Register</button>
										</div>
									</div>
									@csrf
                    			</form>
							</div>
											
				</div>
				@endauth
			</div>
			<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
						@if (session('cart'))
								@foreach(session('cart') as $id => $item)
									<tr class="mot">
										<td class="cart_product">
											<a href=""><img src="{{ asset('upload/product/'.$item['image']) }}" width="100" height="110" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{ $item['title'] }}</a></h4>
											<p>Web ID: {{ $id }}</p>
										</td>
										<td class="cart_price">
											<p>${{ $item['price'] }}</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['qty'] }}" autocomplete="off" size="2">
												
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">${{ $item['price'] * $item['qty'] }}</p>
										</td>
									</tr>
								@endforeach
							@endif
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Cart Sub Total</td>
											<td><span id="totalCart">$59</span></td>
										</tr>
										<tr>
											<td>Exo Tax</td>
											<td>$2</td>
										</tr>
										<tr class="shipping-cost">
											<td>Shipping Cost</td>
											<td>Free</td>										
										</tr>
										<tr>
											<td>Total</td>
											<td><span id="total">$61</span></td>
										</tr>
										<tr>
											<td>
												<form action="{{url('/sendmail')}}" method="POST">
													@csrf
													<button id="order" class="btn btn-success btn-default">Order</button>
												</form>
												
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

    @include('frontend.layouts.footer')

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/js/price-range.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		function updateTotal() {
			var totalCart = 0;
			$(".cart_total_price").each(function () {
				var price = parseFloat($(this).text().replace("$", ""));
				totalCart += price;
			});
			var total = totalCart + 2;
			console.log(total);
			$("#totalCart").text("$" + totalCart);
			$("#total").text("$" + total);
		}
		updateTotal();

	})
</script>
</body>
</html>