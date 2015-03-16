--TEST--
Timeout within foreach loop
--FILE--
<?php

include dirname(__FILE__) . DIRECTORY_SEPARATOR . "timeout_config.inc";

$t = 3;
set_time_limit($t);

foreach(range(0, 42) as $i) { 
	echo 1; 
	busy_sleep(1);
}

?>
never reached here
--EXPECTF--
111
Fatal error: Maximum execution time of 3 seconds exceeded in %s on line %d
