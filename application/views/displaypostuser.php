<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 10:18 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
$username = $this->uri->segment(1, 0);
echo form_open_multipart('/'.$username.'/manage/editpostuser', array('id' => 'fileupload')); ?>
<?php
echo '<h3>your post diary</h3>'.'<br>';
    echo 'you have '.count($postinfo).' post<br>';
foreach($postinfo as $obj){
    echo '<br>-------------------<br>';
    echo $obj->comment.'<br>';
    echo "<input type='hidden' value='$obj->ppid' name='ppid'>";
    echo '<a href="../manage/editpostuser/'.$obj->ppid.'">Edit</a> || ';
    echo '<a href="../manage/editpostuser/'.$obj->ppid.'">Delete</a>';
}
?>
<?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>