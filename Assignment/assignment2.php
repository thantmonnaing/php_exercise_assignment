<?php 

	$city_arr = array(
		"New York" => 8175133 , 
		"Los Angeles" => 3792621,
		"Chicago" => 2695598,
		"Houston" => 2100263,
		"Philadelphia" => 1526006,
		"Phoenix" => 1445632,
		"San Antonio" => 1307402,
		"San Diego" => 1307402,
		"Dallas" => 11197816,
		"San Jose" =>945942
	);
	$total_people = 0;

	// Locations and Populations

	echo '<h3>Locations and Populations</h3>
	<table border="1" cellspacing="0px" width="400px">
			<tr height="40px" width="300px">
			 	<th>City</th>
			 	<th>Population</th>
		 	</tr>

	';
	
	foreach ($city_arr as $key => $value) {
		echo '
			<tr height="40px" width="300px" align="center">
			 	<td>'.$key.'</td>
			 	<td>'.$value.'</td>
		 	</tr>
		';
		$total_people+=$value;
	}
		echo '
			<tr height="40px" width="300px" align="center">
			 	<th>Total</th>
			 	<th>'.$total_people.'</th>
		 	</tr>
		';


	echo '</table>';


	// Orderby populations
	echo '<h3>Orderby populations</h3>
	<table border="1" cellspacing="0px" width="400px">
			<tr height="40px" width="300px">
			 	<th>City</th>
			 	<th>Population</th>
		 	</tr>

	';
	asort($city_arr);
	foreach ($city_arr as $city => $people) {
		echo '
			<tr height="40px" width="300px" align="center">
			 	<td>'.$city.'</td>
			 	<td>'.$people.'</td>
		 	</tr>
		';
	}
	echo '
			<tr height="40px" width="300px" align="center">
			 	<th>Total</th>
			 	<th>'.$total_people.'</th>
		 	</tr>
		';


	echo '</table>';


	// Orderby city
	echo '<h3>Orderby City</h3>
	<table border="1" cellspacing="0px" width="400px">
			<tr height="40px" width="300px">
			 	<th>City</th>
			 	<th>Population</th>
		 	</tr>

	';
	ksort($city_arr);
	foreach ($city_arr as $city => $people) {
		echo '
			<tr height="40px" width="300px" align="center">
			 	<td>'.$city.'</td>
			 	<td>'.$people.'</td>
		 	</tr>
		';
	}
	echo '
			<tr height="40px" width="300px" align="center">
			 	<th>Total</th>
			 	<th>'.$total_people.'</th>
		 	</tr>
		';

	echo '</table>';


 ?>