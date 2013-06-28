<?php

$url_parts = explode('/', getcwd());
$docroot_parent = $url_parts[3];
$memcache = false;
echo $docroot_parent;

switch ($docroot_parent) {
  case 'dev.on.joshuataylor.co':
    $database_name = 'on_dev';
    $memcache = true;
    break;
  case 'stage.on.joshuataylor.co':
    $database_name = 'on_stage';
    $memcache = true;
    break;
  case 'on.joshuataylor.co':
    $database_name = 'on_prod';
    $memcache = true;
    break;
}

$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => $database_name,
      'username' => 'drupal',
      'password' => 'Linode#13mysql-drupal',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

if ($memcache) {
  $conf['cache_backends'][] = 'sites/all/modules/memcache/memcache.inc';
  $conf['cache_default_class'] = 'MemCacheDrupal';
  $conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
  $conf['memcache_key_prefix'] = $_SERVER['VHOST_NICK']; 
}

?>
