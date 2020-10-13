<?php 

	$burger = 4.95;
	$hamburger = 4.95*2;  //2 $
	$milkshake = 1.95; //1 $
	$cola = 0.85; // cent
	$tax = 7.5; // %
	$tip = 16; //%
	$total = ($hamburger + $milkshake + $cola);
	$total_tax = $total*(7.5/100);
	$pre_tax = $total*(16/100);
	$amount = $total + $total_tax +$pre_tax;
	

	echo '<table border="1" cellspacing="0px" width="400px">
			<tr height="50px">
			<th colspan="4">Slip</th>
			</tr>
		 <tr height="50px">
		 	<th>Item</th>
		 	<th width="80px">Price</th>
		 	<th>Quantity</th>
		 	<th>Total Price</th>
		 </tr>
		  <tr align="center" height="50px">
		 	<td>Hamburger</td>
		 	<td>$'.$burger.'</td>
		 	<td>2</td>
		 	<td>$'.$hamburger.'</td>
		 </tr>
		 <tr align="center" height="50px">
		 	<td>Chocolate Milkshake</td>
		 	<td>$'.$milkshake.'</td>
		 	<td>1</td>
		 	<td>$'.$milkshake.'</td>
		 </tr>
		  <tr align="center" height="50px">
		 	<td>Cola</td>
		 	<td>$'.$cola.'</td>
		 	<td>1</td>
		 	<td>$'.$cola.'</td>
		 </tr>
		 <tr align="center" height="50px">
		 	<td colspan="3">Total</td>
		 	<td>$'.$total.'</td>
		 </tr>
		 <tr align="center" height="50px">
		 	<td colspan="3">Tax</td>
		 	<td>$'.$total_tax.'</td>
		 </tr>
		 <tr align="center" height="50px">
		 	<td colspan="3">Pre-tax tip</td>
		 	<td>$'.$pre_tax.'</td>
		 </tr>
		 <tr align="center" height="50px">
		 	<td colspan="3">Net Amount</td>
		 	<td>$'.$amount.'</td>
		 </tr>

	';


	echo '</table>';

 ?>