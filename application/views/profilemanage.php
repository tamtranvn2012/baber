<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>
<?php echo '<ul>';?>
<?php echo '<li class="list"style=" margin-top:20px;" >';?>
<a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>

<?php echo '</li>';?>

<?php
foreach($bpidsmanage as $perbpidobj){
    $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
    echo '<li class=" list">';
    echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a>';
     echo '</li>';
}

?>

<?php

foreach($apidsobjs as $perapidobj){

    $upid = $perapidobj->upid;
    $bpid = $perapidobj->bpid;
    $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
    echo '<li class=" list">';
    echo '<a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a>';
     echo '</li>';
}
?>
<?php echo '<li class=" list">';?>
<a href="<?php echo base_url($username.'/manage/biposts');?>">Make New Post on independent</a>
<?php echo '</li>';?>
<?php echo '<li class=" list">';?>
<a href="<?php echo base_url($username.'/manage/addbussinessprofile');?>">Add New Bussiness Profile</a>
<?php echo '</li>';?>

<?php echo '<li class="  list">';?>
<a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Profile</a>
<?php echo '</li>';?>
<?php echo '</ul>';?>
<?php echo '</div>';?>
<?php echo '</div>';?>



