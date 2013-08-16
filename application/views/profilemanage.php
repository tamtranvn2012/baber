<?php echo '<div class="span12">';?>
<?php echo '<div class="span4 offset3 content">';?>
<?php echo '<ul class="span4 slider-bar">';?>
<?php echo '<li class="span3 list" >';?>
<a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>

<?php echo '</li>';?>

<?php
foreach($bpidsmanage as $perbpidobj){
    $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
    echo '<li class="span3 list">';
    echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a>';
     echo '</li>';
}

?>

<?php

foreach($apidsobjs as $perapidobj){
    $upid = $perapidobj->upid;
    $bpid = $perapidobj->bpid;
    $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
    echo '<li class="span3 list">';
    echo '<a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a>';
     echo '</li>';
}
?>
<?php echo '<li class="span3 list">';?>
<a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Bussiness Profile</a>
<?php echo '</li>';?>
<?php echo '</ul>';?>
<?php echo '</div>';?>
<?php echo '</div>';?>


