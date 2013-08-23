<?php echo '<div class="container">';?>
<?php echo '<div class="row well offset1">';?>

    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/edituserprofile/', array('id' => 'fileupload'));
    foreach ($listuserprofile as $upprofile) {
        echo '<ul class="span3 ">';
        echo '<li>'.'Photo Link: ' . $upprofile->photo_link.'</li>';
        echo '<li>'.'Address: ' . $upprofile->address.'</li>' ;
        echo  '<li>'.'City: ' . $upprofile->city.'</li>' ;
        echo '<li>'.'State: ' . $upprofile->state.'</li>' ;
        echo '<li>'.'Zip: ' . $upprofile->zip.'</li>' ;
        echo '<li>'.'Phone: ' . $upprofile->phone.'</li>' ;
        echo '<li>'.'Instangram: ' . $upprofile->instantgram.'</li>';
        echo '<li>'.'Facebook: ' . $upprofile->facebook.'</li>';
        echo '<li>'.'Favorites Tool: ' . $upprofile->favorites_tool.'</li>';
        echo '<li>'.'Private: ' . $upprofile->isprivate.'</li>';
        echo '<li>'.'Baber Shop Name: ' . $upprofile->babershopname.'</li>';
        echo '<li>'.'Slug: ' . $upprofile->slug.'</li>';
        //  $id = $this->uri->segment(3, 0);
        echo '<li>'."<a href='../manage/edituserprofile/$upprofile->upid' name='$upprofile->upid'>Edit</a>".'</li>';
        echo '</ul>';
    }
    ?>
    <?php echo form_close(); ?>
</div>
<?php echo '</div>';?>
<?php echo '</div>';?>