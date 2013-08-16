<?php
<<<<<<< HEAD
	$managelinksurl = '/'.$username.'/manage/';
	$requestapprovelinksurl = '/'.$username.'/manage/requestapprove/';
	$approvelistinglinksurl = '/'.$username.'/manage/approvelisting/';
	$controlapprovelinksurl = '/'.$username.'/manage/controlapprove/';
	$controlpostlinksurl = '/'.$username.'/manage/controlpost/';
	$logoutlinksurl = '/user/logout/';
	echo '<div class="menu_header">';
	echo '<ul>';
	echo '<li>';
	echo '<a href="'.base_url($managelinksurl).'">Manage</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="'.base_url($approvelistinglinksurl).'">Approve Listing - For Client</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="'.base_url($requestapprovelinksurl).'">Request Approve - For Client</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="'.base_url($controlapprovelinksurl).'">Control Approve - For Bussiness</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="'.base_url($controlpostlinksurl).'">Control Posts - For Client</a>';
	echo '</li>';
	echo '<li>';
	echo '<a href="'.base_url($logoutlinksurl).'">Log out</a>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
?>
=======
$managelinksurl = '/' . $username . '/manage/';
$requestapprovelinksurl = '/' . $username . '/manage/requestapprove/';
$approvelistinglinksurl = '/' . $username . '/manage/approvelisting/';
$controlapprovelinksurl = '/' . $username . '/manage/controlapprove/';
$controlpostlinksurl = '/' . $username . '/manage/controlpost/';
$addnewbussinessprofile = '/'.$username.'/manage/addprofile/';
$logoutlinksurl = '/user/logout/';
echo '<ul>';
echo '<li>';
echo '<a href="' . base_url($managelinksurl) . '">Manage</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($approvelistinglinksurl) . '">Approve Listing - For Client</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($requestapprovelinksurl) . '">Request Approve - For Client</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($controlapprovelinksurl) . '">Control Approve - For Bussiness</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($controlpostlinksurl) . '">Control Posts - For Client</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($addnewbussinessprofile) . '">Add new bussiness profile</a>';
echo '</li>';
echo '<li>';
echo '<a href="' . base_url($logoutlinksurl) . '">Log out</a>';
echo '</li>';
echo '</ul>';
?>
>>>>>>> e9f0cf58f4f2ee8f70a49349309cd9b667b6c562
