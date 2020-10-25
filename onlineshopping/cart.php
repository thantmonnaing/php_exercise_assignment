<?php 
	require('frontend_header.php');
?>

<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> Your Shopping Cart </h1>
	</div>
</div>

<div class="container">
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
							<?php if(isset($_SESSION['login_user'])) {?>
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn">
									Check Out 
								</button>
							<?php }else{ 
								$_SESSION['cartURL'] = 'cart.php';
								?>
								<a href="login.php" class="btn btn-secondary btn-block mainfullbtncolor"> Check Out </a>
							<?php } ?>
						</td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>	
</div>


<?php 
	require('frontend_footer.php');
?>