<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
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
						<!-- <tr>
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
								</table>
							</td>
						</tr> -->
					</tbody>
				</table>
			</div>
	</section>

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/js/price-range.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	// $(document).ready(function(){
	// 	function updateTotal() {
	// 		var totalCart = 0;
	// 		$(".cart_total_price").each(function () {
	// 			var price = parseFloat($(this).text().replace("$", ""));
	// 			totalCart += price;
	// 		});
	// 		var total = totalCart + 2;
	// 		console.log(total);
	// 		$("#totalCart").text("$" + totalCart);
	// 		$("#total").text("$" + total);
	// 	}
	// 	updateTotal();
	// })
</script>
</body>
</html>