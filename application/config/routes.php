<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'users';
$route['signin'] = 'users/signin';
$route['process_signin'] = 'users/process_signin/';
$route['register'] = 'users/register';
$route['process_register'] = 'users/process_register/';
$route['new'] = 'users/new_user';
$route['editUserProfile'] = 'users/editUserProfile';
$route['editUserPassword'] = 'users/editUserPassword';
$route['editUserDescription'] = 'users/editUserDescription';
$route['confirm_remove'] = 'users/confirm_remove';
$route['remove'] = 'users/remove';
$route['logout'] = 'users/logout';
$route['edit/(:num)'] = 'users/edit_own_profile/$1';
// $route['dashboard/(:any)'] = "users/dashboard/$1";
$route[''] = 'users/index';


$route['404_override'] = 'errors/page_missing';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
