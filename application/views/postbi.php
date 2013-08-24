<?php echo '<div class="container">';?>
<?php echo '<div class="row well">';?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 8:19 AM
 * To change this template use File | Settings | File Templates.
 */
foreach($independentinfo as $info){
    echo '<ul>';
    echo '<li>'."<input type='hidden' value='$info->ppid' name='ppid'>".'</li>';
    echo '<li>'.$info->babershopname.'</li>';
    echo '<li>'.$info->baber_type.'</li>';
    echo '<li>'."<a href='../manage/biposts/edit/$info->ppid'>Edit</a>".'</li>';
    echo '<li>'."<a href='../manage/biposts/delete/$info->ppid'>Delete</a><br>".'</li>';
    echo '</ul>';
}
?>
<?php echo '</div>';?>
<?php echo '</div>';?>