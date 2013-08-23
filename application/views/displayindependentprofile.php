<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>

<div id="upload-img">
    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/editindependent/', array('id' => 'fileupload'));
    foreach ($listindependent as $biprofile) {
        echo'Photo Link: ' . $biprofile->photo_link;
        echo'Address: ' . $biprofile->address ;
        echo'City: ' . $biprofile->city ;
        echo'State: ' . $biprofile->state ;
        echo'Zip: ' . $biprofile->zip ;
        echo'Phone: ' . $biprofile->phone ;
        echo'Instangram: ' . $biprofile->instantgram;
        echo'Facebook: ' . $biprofile->facebook;
        echo'Favorites Tool: ' . $biprofile->favorites_tool;
        echo'Private: ' . $biprofile->isprivate . '';
        echo'Baber Shop Name: ' . $biprofile->babershopname;
        echo'Slug: ' . $biprofile->slug;
        //  $id = $this->uri->segment(3, 0);
        echo"<a href='../manage/editindependent/$biprofile->upid' name='$biprofile->upid'>Edit</a>";
        echo"<a href='../manage/deleteindependent/$biprofile->upid' name='$biprofile->upid'>Delete</a><br>";
    }
    ?>
    <?php echo form_close(); ?>
</div>
<?php echo '</div>';?>
<?php echo '</div>';?>