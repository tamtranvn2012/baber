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
$bpid = $this->uri->segment(4, 0);
echo '<div class="span11 text-center">'."<a href='../addnewpostbpbybp/$bpid'>Add new post</a><br>".'</div>';
foreach($bussinessinfo as $info){
    echo '<ul class="span3">';
    echo "<input type='hidden' value='$info->ppid' name='ppid'>";
    echo  '<li>'.$info->babershopname.'</li>';
    echo '<li>'.$info->baber_type.'</li>';

    $edit = $username.'/manage/bpposts/edit/'.$info->ppid;
    $delete = $username.'/manage/bpposts/delete/'.$info->ppid;
    echo '<li>'.'<a href="' . base_url($edit) . '">Edit</a>'.'</li>';
    echo '<li>'.'<a href="' . base_url($delete) . '">delete</a><br>'.'</li>' ;
    echo '</ul>';
}
?>
<?php echo '</div>';?>
<?php echo '</div>';?>
