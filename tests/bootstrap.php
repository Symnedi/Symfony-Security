<?php

include __DIR__.'/../vendor/autoload.php';

$tempDir = __DIR__.'/temp/'.getmypid();
define('TEMP_DIR', $tempDir);
mkdir($tempDir, 0777, true);

register_shutdown_function(function () {
    Nette\Utils\FileSystem::delete(TEMP_DIR);
});
