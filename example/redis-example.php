<?php

require('../lib/init.php');

use Hybrid\Cache;
use Hybrid\storages\Redis as RedisStorage;


// Set your host/port
Cache::addStorageMedia( new RedisStorage('localhost') );

$cache = Cache::create('key');

if ($data = $cache->getCache(true)) {
	echo "del cache: " . $data;
	echo "\n";
	exit(0);
} else {
	$cache->setStatusSaving();
}


echo "Generando contenido";

sleep(5);

$contenido = md5(rand(1,99999));

echo $contenido;
echo "\n";

$cache->save($contenido);
