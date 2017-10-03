<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			function total_intervals($unit, DateInterval ...$intervals) {//los argumentos de longitud variable deben ir al final
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval->$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).' days';

// Esto fallará, debido a que  null no es un objeto de DateInterval.
echo total_intervals('d', null);
		?>
	</body>
</html>

