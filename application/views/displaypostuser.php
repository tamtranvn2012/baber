<?php echo '<div class="container">';?>
<?php echo '<div class="row well">';?>
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
echo '<div class="span11 text-center">';
echo '<ul>';
echo '<li>'.'<h3>'.'Your post diary'.'</h3>'.'</li>';
echo '<li>'.'You have'.'&nbsp;'.count($postinfo).'&nbsp;'.'post'.'</li>';
echo '<li>'.'<a href="../manage/postuser">Add your new post</a>'.'</li>';
echo '</ul>';
echo '</div>';
foreach($postinfo as $obj){
    echo '<ul class="span3">';
    echo '<li>'.$obj->comment.'</li>';
    echo "<input type='hidden' value='$obj->ppid' name='ppid'>";
    echo '<li>'.'<a href="../manage/editpostuser/'.$obj->ppid.'">Edit</a>'.'</li>';
    echo '<li>'.'<a href="../manage/deletepostuser/'.$obj->ppid.'">Delete</a>'.'</li>';
    echo '</ul>';
}
?>
<?php echo form_close(); ?>
<?php echo '</div>';?>
<?php echo '</div>';?>