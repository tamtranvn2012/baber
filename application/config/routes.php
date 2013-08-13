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

$route['default_controller'] = "frontpage";
$route['404_override'] = '';
$route['(:any)/manage/approveapid/(:any)/(:any)'] = "profilepage/approved_apid";
$route['(:any)/manage/unapproveapid/(:any)/(:any)'] = "profilepage/unapproved_apid";
$route['(:any)/manage/listapprove/(:any)'] = "profilepage/listing_approved_by_bpid";
$route['(:any)/manage/addnewpost/(:any)/(:any)'] = "profilepage/add_new_post";
$route['(:any)/manage/requestapprove'] = "profilepage/request_approve";
$route['(:any)/manage/saverequest'] = "profilepage/save_request_approve";
$route['(:any)/manage/posts'] = "profilepage/manage_bp_posts";
$route['search/zipcode'] = "search/search_by_zipcode";
$route['(:any)/manage'] = "profilepage/profile_manage";
$route['upload/addnew'] = "upload/upload_img";
$route['user/login'] = "user/login";
$route['user/checklogin'] = "user/checklogin";
$route['test'] = "test";
$route['(:any)'] = "profilefrontpage";



/* End of file routes.php */
/* Location: ./application/config/routes.php */
