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
$bpid = $this->uri->segment(4, 0);
echo "<a href='../addnewpostbpbybp/$bpid'>Add new post</a><br>";

foreach($bussinessinfo as $info){
    echo "<input type='hidden' value='$info->ppid' name='ppid'>";
    echo $info->babershopname;
    echo $info->baber_type;

    $edit = $username.'/manage/bpposts/edit/'.$info->ppid;
    $delete = $username.'/manage/bpposts/delete/'.$info->ppid;
    echo '<a href="' . base_url($edit) . '">Edit</a>';
    echo '<a href="' . base_url($delete) . '">delete</a><br>' ;

}
?>
<?php echo '</div>';?>
<?php echo '</div>';?>
