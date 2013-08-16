<?php echo '<div class="span3">';
?>
<a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>
<?php

foreach($bpidsmanage as $perbpidobj){
    $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
    echo '<p><a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a></p>';
}

<<<<<<< HEAD
=======
?>

<?php
>>>>>>> e9f0cf58f4f2ee8f70a49349309cd9b667b6c562
foreach($apidsobjs as $perapidobj){
    $upid = $perapidobj->upid;
    $bpid = $perapidobj->bpid;
    $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
    echo '<p><a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a></p>';
}
?>
<<<<<<< HEAD
<a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Bussiness Profile</a>
<?php
 echo '</div>';
?>
=======
>>>>>>> e9f0cf58f4f2ee8f70a49349309cd9b667b6c562
