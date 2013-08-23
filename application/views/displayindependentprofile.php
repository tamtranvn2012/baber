<?php echo '<div class="container">';?>
<?php echo '<div class="row well offset1">';?>

    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/editindependent/', array('id' => 'fileupload'));
    foreach ($listindependent as $biprofile) {
         echo '<ul class="span3 ">';
        echo '<li>'.'Photo Link: ' . $biprofile->photo_link.'</li>';
        echo '<li>'.'Address: ' . $biprofile->address.'</li>' ;
        echo '<li>'.'City: ' . $biprofile->city.'</li>' ;
        echo '<li>'.'State: ' . $biprofile->state.'</li>' ;
        echo '<li>'.'Zip: ' . $biprofile->zip.'</li>' ;
        echo '<li>'.'Phone: ' . $biprofile->phone.'</li>' ;
        echo '<li>'.'Instangram: ' . $biprofile->instantgram.'</li>';
        echo '<li>'.'Facebook: ' . $biprofile->facebook.'</li>';
        echo '<li>'.'Favorites Tool: ' . $biprofile->favorites_tool.'</li>';
        echo '<li>'.'Private: ' . $biprofile->isprivate.'</li>';
        echo '<li>'.'Baber Shop Name: ' . $biprofile->babershopname.'</li>';
        echo '<li>'.'Slug: ' . $biprofile->slug.'</li>';
        //  $id = $this->uri->segment(3, 0);
        echo '<li>'."<a href='../manage/editindependent/$biprofile->upid' name='$biprofile->upid'>Edit</a>".'</li>';
        echo '<li>'."<a href='../manage/deleteindependent/$biprofile->upid' name='$biprofile->upid'>Delete</a><br>".'</li>';
        echo '</ul>';
    }
    ?>
    <?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>