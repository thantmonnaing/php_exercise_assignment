<?php  


	echo "
		<table border='1px' cellspacing='0px' width='400px'>
	";

	for ($row=0; $row < 8 ; $row++) { 
		echo "<tr>";
		for ($col=0; $col < 8; $col++) { 

			if(($row+$col)%2 == 0){
				echo "<td height='50px' width='50px' bgcolor='#fff'></td>";
			}else{				
				echo "<td height='50px' width='50px' bgcolor='#000'></td>";
			}
			
		}
		echo "</tr>";
	}

	echo "</table>";

?> 




<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	
	table.chess {
		padding: 0;
		margin: 0;
	}
	table.chess td {
		width: 25px;
		height:25px;
		padding: 0;
		margin: 0;
		text-align: center;
	}
	table.chess td.odd {
		background: #fff;
	}
	table.chess td.even {
		background: #000;
	}
	table.chess td.top {
		border-top: 1px solid;
	}
	table.chess td.bottom {
		border-bottom: 1px solid;
	}
	table.chess td.left {
		border-left: 1px solid;
	}
	table.chess td.right {
		border-right: 1px solid;
	}
</style>


<body>
	<?php
	$gridSize = 8;

	echo "<table class='chess' cellpadding='0' cellspacing='0'>";
	for($i = $gridSize; $i >= 0; $i--) {
		echo "<tr>";
		for($j = 0; $j <= $gridSize; $j++) {
			$classes = [];
			$classes[] = ($j+$i) % 2 ? 'odd' : 'even';

			if ($i === $gridSize) {
				$classes[] = 'top';
			}

			if ($i === 1) {
				$classes[] = 'bottom';
			}

			if ($j === 1) {
				$classes[] = 'left';
			}

			if ($j === $gridSize) {
				$classes[] = 'right';
			}

			if ($j === 0 && $i !== 0) {
				echo "<td>$i</td>";
			} elseif ($i === 0 && $j !== 0) {
				echo "<td>" . chr(65+$j-1) . "</td>";
			} elseif ($i === 0 && $j === 0) {
				echo "<td></td>";
			} else {
				echo "<td class='" . implode(' ', $classes) . "'></td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";

	?> 
</body>
</html> -->