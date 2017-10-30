<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

define('SHOW_DEBUG_BACKTRACE', TRUE);

define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code




/*	==========================	DATABASE	==========================	*/


//users

define('USERS', 'users');

define('ID', 'id');
define('USERNAME', 'username');
define('PASSWORD', 'password');


//banners

define('BANNERS', 'banners');


//pages

define('PAGES', 'pages');

define('TITLE', 'title');
define('BODY', 'body');
define('ACTIVE', 'active');


//cars

define('CARS', 'cars');

define('NAME', 'name');
define('SLUG', 'slug');
define('ICON', 'icon');
define('HYBRID', 'hybrid');


//models

define('CONFIGURATIONS', 'configurations');

define('MAX_SPEED','max_speed');
define('ACCELERATION','acceleration');
define('FRONT_SUSPENSION','front_suspension');
define('REAR_SUSPENSION','rear_suspension');
define('FRONT_BRAKES','front_brakes');
define('REAR_BRAKES','rear_brakes');
define('TRANSMISSION','transmission');
define('ENGINE_CODE','engine_code');
define('CYLINDER_COUNT','cylinder_count');
define('VALVE_MECHANISM','valve_mechanism');
define('FUEL_INJECTION','fuel_injection');
define('VOLUME','volume');
define('CYLINDER_DIAMETER','cylinder_diameter');
define('COMPRESSION','compression');
define('LENGTH','length');
define('WIDTH','width');
define('HEIGHT','height');
define('DISTANCE_FRONT_WHEELS','distance_front_wheels');
define('DISTANCE_REAR_WHEELS','distance_rear_wheels');
define('WHEEL_BASE','wheel_base');
define('WEIGHT','weight');
define('FUEL_CONSUMPTION','fuel_consumption');
define('RECOMMENDED_FUEL','recommended_fuel');
define('CAPACITY','capacity');
define('PRICE', 'price');



//accessories

define('ACCESSORIES', 'accessories');

define('DESCRIPTION', 'description');
define('CATEGORY', 'category');
define('POPULAR', 'popular');
define('CAR', 'car');
define('CATEGORY_NAME', 'category_name');		//used when joining as alias



//accessory_categories

define('ACCESSORY_CATEGORIES', 'accessory_categories');


//gallery

define('GALLERY', 'gallery');


//videos

define('VIDEOS', 'videos');

define('POSTER', 'poster');
define('SUBTITLES', 'subtitles');
define('TEXT', 'text');

define('WHY_TOYOTA', 'why_toyota');		//used to distinguish between car and general videos


define('CONFIG', 'config');
define('EMAIL', 'email');


/*	==========================	SESSION 	==========================	*/


define('USER', 'user');


/*	==========================	MISC 	==========================	*/

define('SUCCESS_MESSAGE', 'success_message');
define('ERROR_MESSAGE', 'error_message');

define('OFFERS_PER_PAGE', 20);

define('V', 1);
