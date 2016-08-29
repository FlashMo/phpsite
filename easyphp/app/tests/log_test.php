<?php
log::$rules = array('info'=>'info.txt');
return log::write('info', 'log_test.php', 'this is an test log!');
