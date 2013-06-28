<?php

$url_parts = explode('/', getcwd());
$docroot_parent = $url_parts[3];
$memcache = false;
echo $docroot_parent;

$database_array = array(

  'drupal.linode.joshuataylor.co'	=>	'drupal',
  'drupal8.linode.joshuataylor.co'	=>	'drupal8,

  'joshuataylor.co'			=>	'joshuataylor.co',
  'wildsides.com'			=>	'wildsides.com',

  'dev.on.joshuataylor.co'		=>	'on_dev',
  'stage.on.joshuataylor.co'		=>	'on_stage',
  'on.joshuataylor.co'			=>	'on_prod',
);



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
