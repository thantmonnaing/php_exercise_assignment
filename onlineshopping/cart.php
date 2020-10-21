<?php 
	require('frontend_header.php');
?>

<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> Your Shopping Cart </h1>
	</div>
</div>

<!-- <div class="tile">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Product</th>
				<th></th>
				<th></th>
				<th>Qty</th>
				<th>Price</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody id="tbody">
			
		</tbody>		
	</table>
	<div class="row mx-5">
			<div class="col-8 col-sm-8 col-md-8 col-lg-8">
				<textarea rows="3" class="w-100 form-control" placeholder="Any Request...">
				</textarea>
			</div>
			<div class="col-4 col-sm-4 col-md-4 col-lg-4">
				<button type="button" class="btn btn-danger btn-lg btn-block">Check Out</button>	
			</div>
		</div>
</div> -->

<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th colspan="2">Product</th>
							<th></th>
							<th></th>
							<th>Qty</th>
							<th>Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody id="tbody">
						
					</tbody>
					<tfoot id="tfoot">
						<tr>
							<td colspan="8">
								<h3 class="text-right mr-5" id="cart_total"></h3>
							</td>
						</tr>
						<tr class="mx-5"> 
							<td></td>
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
									Check Out 
								</button>
							</td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

<?php 
	require('frontend_footer.php');
?>