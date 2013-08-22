<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>

<div id="upload-img">
    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/edituserprofile/', array('id' => 'fileupload'));
    foreach ($listuserprofile as $upprofile) {
        echo'Photo Link: ' . $upprofile->photo_link;
        echo'Address: ' . $upprofile->address ;
        echo'City: ' . $upprofile->city ;
        echo'State: ' . $upprofile->state ;
        echo'Zip: ' . $upprofile->zip ;
        echo'Phone: ' . $upprofile->phone ;
        echo'Instangram: ' . $upprofile->instantgram;
        echo'Facebook: ' . $upprofile->facebook;
        echo'Favorites Tool: ' . $upprofile->favorites_tool;
        echo'Private: ' . $upprofile->isprivate . '';
        echo'Baber Shop Name: ' . $upprofile->babershopname;
        echo'Slug: ' . $upprofile->slug;
        //  $id = $this->uri->segment(3, 0);
        echo"<a href='../manage/edituserprofile/$upprofile->upid' name='$upprofile->upid'>Edit</a>";
    }
    ?>
    <?php echo form_close(); ?>
</div>
<?php echo '</div>';?>
<?php echo '</div>';?>