<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/21/13
 * Time: 9:52 AM
 * To change this template use File | Settings | File Templates.
 */
foreach($listbpobj as $obj){
    echo "<a href='../manage/bppost/$obj->bpid'>Manage post by bpid</a>".$obj->bpid;
    echo "<input type='hidden' value='$obj->bpid' name='bpid'>";
}