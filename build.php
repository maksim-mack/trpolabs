<?php

shell_exec('git clone https://github.com/rok9ru/trpo-core core');

file_put_contents('./version', trim(shell_exec('git symbolic-ref --short -q HEAD')));
//file_put_contents('start.bat', "php index.php \npause");
