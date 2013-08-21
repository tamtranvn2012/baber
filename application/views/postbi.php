<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 8:19 AM
 * To change this template use File | Settings | File Templates.
 */
foreach($independentinfo as $info){
    echo "<input type='hidden' value='$info->ppid' name='ppid'>";
    echo $info->babershopname.'<br>';
    echo $info->baber_type;
    echo "<a href='../manage/biposts/edit/$info->ppid'>Edit</a>";
    echo "<a href='../manage/biposts/delete/$info->ppid'>Delete</a>";
}