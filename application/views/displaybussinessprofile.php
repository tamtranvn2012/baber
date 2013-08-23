<?php echo '<div class="container">';?>
<?php echo '<div class="row  well offset1">';?>

    <?php
    $username = $this->uri->segment(1, 0);
    echo form_open_multipart('/' . $username . '/manage/editprofile/', array('id' => 'fileupload'));
    foreach ($listBusiness as $bprofile) {
        echo '<ul class="span3 ">';
        echo '<li>'.'Photo Link: ' . $bprofile->photo_link.'</li>';
        echo '<li>'.'<p>'.'Address: ' . $bprofile->address.'</p>'.'</li>' ;
        echo '<li>'.'City: ' . $bprofile->city.'</li>' ;
        echo '<li>'.'State: ' . $bprofile->state.'</li>' ;
        echo '<li>'.'Zip: ' . $bprofile->zip.'</li>' ;
        echo '<li>'.'Phone: ' . $bprofile->phone.'</li>' ;
        echo '<li>'.'Instangram: ' . $bprofile->instantgram.'</li>';
        echo '<li>'.'Facebook: ' . $bprofile->facebook.'</li>';
        echo '<li>'.'Favorites Tool: ' . $bprofile->favorites_tool.'</li>';
        echo '<li>'.'Private: ' . $bprofile->isprivate .'</li>';
        echo '<li>'.'Baber Shop Name: ' . $bprofile->babershopname.'</li>';
        echo '<li>'.'Slug: ' . $bprofile->slug.'</li>';
        //  $id = $this->uri->segment(3, 0);
        echo '<li>'."<a href='../manage/editbussiness/$bprofile->bpid' name='$bprofile->bpid'>Edit</a>".'</li>';
        echo'<li>'."<a href='../manage/deletebussiness/$bprofile->bpid' name='$bprofile->bpid'>Delete</a><br>".'</li>';
        echo '</ul>';
    }
    ?>
    <?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>