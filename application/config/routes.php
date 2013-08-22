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
$route['(:any)/manage/editbussiness/(:any)'] = "profilepage/editbussiness";
$route['(:any)/manage/editindependent/(:any)'] = "profilepage/editindependent";
$route['(:any)/manage/edituserprofile/(:any)'] = "profilepage/edituserprofile";

$route['(:any)/manage/controlapprove'] = "profilepage/control_approve_listing_bussiness";
$route['(:any)/manage/controlregisternewprofile'] = "profilepage/registernewprofile";
$route['(:any)/manage/controleditprofile'] = "profilepage/controleditprofile";
//control post baber independent - baber bussiness profile
$route['(:any)/manage/controlpost'] = "profilepage/control_post_listing_client";

$route['(:any)/manage/controlpostbp'] = "profilepage/control_post_listing_bp";
$route['(:any)/manage/listbiposts'] = "profilepage/manage_post_listing_bi";
$route['(:any)/manage/listupposts'] = "profilepage/manage_post_listing_up";
$route['(:any)/manage/requestapprove'] = "profilepage/request_approve";
$route['(:any)/manage/saverequest'] = "profilepage/save_request_approve";
$route['(:any)/manage/posts/delete/(:any)'] = "profilepage/delete_post_by_ppid";
$route['(:any)/manage/biposts/delete/(:any)'] = "profilepage/delete_post_by_ppid";
$route['(:any)/manage/upposts/delete/(:any)'] = "profilepage/delete_post_by_ppid";
$route['(:any)/manage/bpposts/delete/(:any)'] = "profilepage/delete_post_bp_by_ppid";
$route['(:any)/manage/posts/edit/(:any)'] = "profilepage/edit_post_by_ppid";
$route['(:any)/manage/biposts/edit/(:any)'] = "profilepage/edit_post_by_ppid";
$route['(:any)/manage/upposts/edit/(:any)'] = "profilepage/edit_post_by_ppid";
$route['(:any)/manage/bpposts/edit/(:any)'] = "profilepage/edit_post_bp_by_ppid";
$route['(:any)/manage/bpposts/(:any)'] = "profilepage/add_post_form_bpid_bpid";
$route['(:any)/manage/biposts'] = "profilepage/add_new_post_imdependent";
$route['(:any)/manage/upposts'] = "profilepage/add_new_post_up_by_up";
$route['(:any)/manage/posts/(:any)/(:any)'] = "profilepage/manage_bp_posts";
//$route['(:any)/manage/posts'] = "profilepage/manage_bp_posts";
$route['(:any)/manage/approvelisting'] = "profilepage/manage_approve_listing_client";
$route['(:any)/manage/addprofile'] = "manage/addprofile";
$route['search/zipcode'] = "search/search_by_zipcode";
$route['(:any)/upload/addbussinessprofile'] = "uploadbussinessregister/upload_img_bussiness";
$route['(:any)/upload/addindependentprofile'] = "addindependent/upload_img_independent";
$route['(:any)/upload/adduserprofile'] = "adduserprofile/upload_img_userprofile";

$route['(:any)/manage/deletebussiness/(:any)'] = "profilepage/delete_bussiness_profile_by_upid";
$route['(:any)/upload/editbussniess'] = "uploadbussiness/upload_img";
$route['(:any)/manage/deleteindependent/(:any)'] = "profilepage/delete_independent_profile_by_upid";
$route['(:any)/upload/editindependent'] = "uploadindependent/upload_img";
$route['(:any)/upload/edituserprofile'] = "uploadregister/upload_img";

$route['(:any)/manage/addbussinessprofile'] = "profilepage/addbussinessprofile";
$route['(:any)/manage/adduserprofile'] = "profilepage/adduserprofile";
$route['(:any)/manage/addindependentprofile'] = "profilepage/addindependentprofile";
$route['(:any)/manage/profilebussiness'] = "manage/profilebussiness";
$route['(:any)/manage/postbpbybp'] = "profilepage/manage_bp_post_bp_by_bpid";
$route['(:any)/manage/addnewpostbpbybp'] = "profilepage/add_new_post_bp_by_bp";
$route['(:any)/manage/bppost/(:any)'] = "profilepage/manage_post_listing_bp_by_bpid";
$route['(:any)/manage'] = "profilepage/profile_manage";

$route['(:any)/manage/displaybussinessprofile'] = "profilepage/displaybussiness";
$route['(:any)/manage/displayindependentprofile'] = "profilepage/displayindependent";
$route['(:any)/manage/displayuserprofile'] = "profilepage/displayuserprofile";
//$route['(:any)/manage/adduserprofile'] = "profilepage/adduserprofile";
$route['upload/uploadbibppost'] = "uploadbibppost/upload_img";
$route['upload/uploadbppost'] = "uploadbppost/upload_img";
$route['upload/uploadbipost'] = "uploadbipost/upload_img";
$route['upload/uploaduppost'] = "uploaduppost/upload_img";

$route['upload/addnew'] = "upload/upload_img";
$route['upload/registerupload'] = "uploadregister/upload_img";

$route['upload/uploadbussiness'] = "uploadbussiness/upload_img";
$route['upload/registerbussinessphoto'] = "uploadbussinessregister/upload_img";
$route['upload/uploadbussiness'] = "uploadbussiness/upload_img";
$route['upload/registerbussiness'] = "uploadbussinessregister/upload_img";
$route['upload/registerindependent'] = "uploadindependent/upload_img";
$route['upload/uploadeditpost'] = "uploadeditpost/upload_img";
$route['upload/uploadeditpostbp'] = "uploadeditpost/upload_img_bp";
$route['upload/uploadbussiness'] = "uploadbussiness/upload_img";

$route['upload/uploadregister'] = "uploadregister/upload_img";
$route['user/login'] = "user/login";
$route['user/registerindependent'] = "user/registerindependent";
$route['user/register'] = "user/register";
$route['user/registeruserprofile'] = "user/registeruserprofile";
$route['user/registerbussinessprofile'] = "user/registerbussinessprofile";

$route['user/checklogin'] = "user/checklogin";
$route['user/check'] = "user/check";
$route['user/checkbussiness'] = "user/checkbussiness";
$route['user/successful'] = "user/successful";
$route['admin'] = "admin";
$route['(:any)'] = "profilefrontpage/findslug";
$route['user/logout'] = "user/logout";
