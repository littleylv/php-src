--TEST--
Timeout within function trowing exteption before timeout reached
--FILE--
<?php

include dirname(__FILE__) . DIRECTORY_SEPARATOR . "timeout_config.inc";

$t = 3;
set_time_limit($t);

function f($t) { 
	echo "call";
	busy_sleep($t-1);
	throw new Exception("exception before timeout");
}

f($t);
?>
never reached here
--EXPECTF--
call
Fatal error: Uncaught exception 'Exception' with message 'exception before timeout' in %s:%d
Stack trace:
#0 %s(%d): f(%d)
#1 {main}
  thrown in %s on line %d
