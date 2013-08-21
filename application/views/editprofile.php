<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>
<?php echo '<ul>';?>
<?php echo '<li class="list"style=" margin-top:20px;" >';?>

<?php
$editbussinessprofile = '/' . $username . '/manage/displaybussinessprofile';
$edituserprofile = '/' . $username . '/manage/displayuserprofile';
$editindependentprofile = '/' . $username . '/manage/displayindependentprofile/';
//echo '<div class="menu_header">';
//echo '<div class="container menu-top">';
echo '<ul class="list-inline">';
echo '<li>';
echo '<a href="' . base_url($edituserprofile) . '">Edit User Profile</a>';
echo '</li><br>';
echo '<li>';
echo '<a href="' . base_url($editbussinessprofile) . '">Edit Bussiness Profile</a>';
echo '</li><br>';
echo '<li>';
echo '<a href="' . base_url($editindependentprofile) . '">Edit Independent Profile</a>';
echo '</li>';
echo '</ul>';
?>
<?php echo '</li>';?>
<?php echo '</ul>';?>
<?php echo '</div>';?>
<?php echo '</div>';?>
