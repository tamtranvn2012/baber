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
echo '<div class="span11 text-center ">'."<a href='../manage/biposts'>Add new post</a><br>".'</div>';
if($independentinfo){
	foreach($independentinfo as $info){

		echo '<ul class="span3">';
		echo "<input type='hidden' value='$info->ppid' name='ppid'>";
		echo '<li>'.$info->babershopname.'</li>';
		echo '<li>'.$info->baber_type.'</li>';
		echo '<li>'."<a href='../manage/biposts/edit/$info->ppid'>Edit</a>".'</li>';
		echo '<li>'."<a href='../manage/biposts/delete/$info->ppid'>Delete</a><br>".'</li>';
		


		echo "<input type='hidden' value='$info->ppid' name='ppid'>";
		echo $info->babershopname;
		echo $info->baber_type;
		echo '<li>'."<a href='../manage/biposts/edit/$info->ppid'>Edit</a>".'</li>';
		echo '<li>'."<a href='../manage/biposts/delete/$info->ppid'>Delete</a><br>".'</li>';
		echo '</ul>';
	}
}
?>
<?php echo '</div>';?>
<?php echo '</div>';?>