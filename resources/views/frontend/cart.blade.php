<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycart</title>
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
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
											<a class="cart_quantity_up" href=""> + </a>
											<input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['qty'] }}" autocomplete="off" size="2">
											<a class="cart_quantity_down" href=""> - </a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">${{ $item['price'] * $item['qty'] }}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

    <section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="totalCart">$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span id="total">$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

    @include('frontend.layouts.footer')

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/js/price-range.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
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

		//tang cart
		$(".cart_quantity_up").click(function(e){
			e.preventDefault();
			var a = $(this).closest(".mot").find(".cart_description p").text();
			var id = a.replace("Web ID: ","");
			$.ajax({
				method: "POST",
				url: "{{route('tangcart')}}",
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
				},
				success: function(res){
					console.log(res);
				}
			});
			var qty = $(this).closest(".mot").find(".cart_quantity input");
			var totalqty = parseInt(qty.val());
			totalqty += 1;
			qty.val(totalqty);

			var price = parseFloat($(this).closest(".mot").find(".cart_price p").text().replace("$", ""));
			var total = price * totalqty;
			$(this).closest(".mot").find(".cart_total p").text("$" + total);
			updateTotal();
		});

		//giam cart
		$(".cart_quantity_down").click(function(e){
			e.preventDefault();
			var a = $(this).closest(".mot").find(".cart_description p").text();
			var id = a.replace("Web ID: ","");
			$.ajax({
				method: "POST",
				url: "{{route('giamcart')}}",
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
				},
				success: function(res){
					console.log(res);
				}
			});
			var qty = $(this).closest(".mot").find(".cart_quantity input");
			var totalqty = parseInt(qty.val());
			totalqty -= 1;
			qty.val(totalqty);
			var price = parseFloat($(this).closest(".mot").find(".cart_price p").text().replace("$", ""));
			var total = totalqty * price;
			$(this).closest(".mot").find(".cart_total p").text("$" + total);
			if(totalqty < 1){
				$(this).closest(".mot").remove();
			}
			updateTotal();
		});

		//xoa cart
		$(".cart_quantity_delete").click(function(e){
			e.preventDefault();
			var a = $(this).closest(".mot").find(".cart_description p").text();
			var id = a.replace("Web ID: ","");
			$.ajax({
				method: "POST",
				url: "{{route('xoacart')}}",
				data: {
					_token: "{{ csrf_token() }}",
					id: id,
				},
				success: function(res){
					console.log(res);
				}
			});
			$(this).closest(".mot").remove();
			updateTotal();
		});
	})
</script>

</body>
</html>