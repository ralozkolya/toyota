<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$host = getenv('OPENSHIFT_MYSQL_DB_HOST');

if(!$host) {
	$host = "localhost";
}

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => get_env('DB_HOST'),
	'username' => get_env('DB_USER'),
	'password' => get_env('DB_PASS'),
	'database' => get_env('DB_NAME'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
