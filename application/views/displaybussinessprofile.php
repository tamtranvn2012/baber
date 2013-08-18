<div id="upload-img">
    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/editprofile/', array('id' => 'fileupload'));
    foreach ($listBusiness as $bprofile) {
        echo'Photo Link: ' . $bprofile->photo_link;
        echo'Address: ' . $bprofile->address ;
        echo'City: ' . $bprofile->city ;
        echo'State: ' . $bprofile->state ;
        echo'Zip: ' . $bprofile->zip ;
        echo'Phone: ' . $bprofile->phone ;
        echo'Instangram: ' . $bprofile->instantgram;
        echo'Facebook: ' . $bprofile->facebook;
        echo'Favorites Tool: ' . $bprofile->favorites_tool;
        echo'Private: ' . $bprofile->isprivate . '';
        echo'Baber Shop Name: ' . $bprofile->babershopname;
        echo'Slug: ' . $bprofile->slug;
        //  $id = $this->uri->segment(3, 0);
        echo"<a href='../manage/editbussiness/$bprofile->bpid' name='$bprofile->bpid'>Edit</a>";
        echo"<a href='../manage/$bprofile->bpid' name='$bprofile->bpid'>Delete</a><br>";
    }
    ?>
    <?php echo form_close(); ?>
</div>