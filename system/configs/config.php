<?php
//Define controller and action default
define('DEFAULT_CONTROLLER', 'user');
define('DEFAULT_ACTION', 'index');

//Config database
define('DB_HOST', 'localhost');
define('DB_NAME', 'fresher_user');
define('DB_USER', 'root');
define('DB_PASS', '');

//Define pagination
define('PER_PAGE', '10');
define('INSTANT', 'page');

//Define name item
define('USER', 'User');

//Define number image
define('NUM_IMG', '3');

//Define active and deactive value
define("ACTIVE_VALUE", "1");
define("DEACTIVE_VALUE", "0");

//Define set time cookie
define("TIME_COOKIE", "7200");

//Define Login
define('LOGIN', '/admin/login');
define('LOGOUT', '/admin/login/logout');

//Define user manager page
define('LIST_USER', '/admin/user');
define('ADD_USER', '/admin/user/add');
define('EDIT_USER', '/admin/user/edit');
define('ACTIVE_USER', '/admin/user/active');
define('SHOW_USER', '/admin/user/show');