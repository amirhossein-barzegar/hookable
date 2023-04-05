<?php
require_once 'src/hook.php';
foreach (glob("plugins/*.php") as $filename) {
    require_once $filename;
}

require_once __DIR__ . '/vendor/autoload.php';

getHeader();
getMain();
getFooter();
