<?php echo '<div class="container">';?>
<?php echo '<div class="span7 offset2 slider-bar text-center">';?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 8:19 AM
 * To change this template use File | Settings | File Templates.
 */
foreach($userinfo as $info){
    echo "<input type='hidden' value='$info->ppid' name='ppid'>";
    echo $info->babershopname;
    echo $info->baber_type;
    echo "<a href='../manage/upposts/edit/$info->ppid'>Edit</a>";
    echo "<a href='../manage/upposts/delete/$info->ppid'>Delete</a><br>";
}
?>
<?php echo '</div>';?>
<?php echo '</div>';?>