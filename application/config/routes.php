<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['pages/test'] = 'pages/test';
$route['pages/query'] = 'pages/query';

$route['pages/schedule_service'] = 'pages/schedule_service';
$route['pages/schedule_test_drive'] = 'pages/schedule_test_drive';
$route['pages/contact_form'] = 'pages/contact_form';
$route['pages/offers'] = 'pages/offers';
$route['pages/news'] = 'pages/news';

$route['pages/photos'] = 'pages/gallery/photos';
$route['pages/photos/(:num)'] = 'pages/gallery/photos/$1';
$route['pages/videos'] = 'pages/gallery/videos';
$route['pages/videos/(:num)'] = 'pages/gallery/videos/$1';

$route['cars/(:any)'] = 'pages/cars/$1';

$route['pages/(:any)'] = 'pages/view/$1';

$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
