
<?php
function myfunc() {
	print "In tick func\n";
}

register_tick_function("myfunc");


declare(ticks=5) {
	for($i = 0; $i < 20; ++$i) {
		echo "Hello.\n";
	}
}




?>

