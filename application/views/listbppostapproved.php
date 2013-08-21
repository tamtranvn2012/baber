<div class="container">
<div class="row">
<!--begin slider-->
                    <div class="span4 well">
                         <?php echo '<ul>';?>
                            <?php echo '<li class="list"style=" margin-top:20px;" >';?>
                            <a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>
                            
                            <?php echo '</li>';?>
                            
                            <?php
                            foreach($bpidsmanage as $perbpidobj){
                                $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a>';
                                 echo '</li>';
                            }
                            
                            ?>
                            
                            <?php
                            
                            foreach($apidsobjs as $perapidobj){
                                $upid = $perapidobj->upid;
                                $bpid = $perapidobj->bpid;
                                $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a>';
                                 echo '</li>';
                            }
                            ?>
                            <?php echo '<li class=" list">';?>
                            <a href="<?php echo base_url($username.'/manage/addbussinessprofile');?>">Add New Bussiness Profile</a>
                            <?php echo '</li>';?>
                            
                            <?php echo '<li class="  list">';?>
                            <a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Profile</a>
                            <?php echo '</li>';?>
                            <?php echo '</ul>';?>
                                
                  </div>
                <!--end slider-->
	<?php
         echo '<div class="span8 well" style="margin-left:10px;">';
		foreach($allinfoposts as $perpostinfo){
			$deleteposturl = '/'.$username.'/manage/posts/delete/'.$perpostinfo->ppid;
			$editposturl = '/'.$username.'/manage/posts/edit/'.$perpostinfo->ppid;
			$deletepost = '<a href="'.base_url($deleteposturl).'">Delete this post</a>';
			$editpost = '<a href="'.base_url($editposturl).'">Edit this post</a>';
			echo '<div class="span4 offset1">';
            echo '<ul>';
            echo '<li>';
			echo '<div class="postinfo" style="float:left;padding-right:20px;padding-bottom:20px;">';
			echo '<div class="postinfo-babershopname">Babershop name:'.$perpostinfo->babershopname.'</div>';
            echo '</li>';
			echo '<div class="postinfo-photo">Photo id:'.$perpostinfo->photo_id.'</div>';
			echo '<div class="postinfo-babertype">Baber type:'.$perpostinfo->baber_type.'</div>';
			echo '<div class="postinfo-delete">'.$deletepost.'</div>';
			echo '<div class="postinfo-edit">'.$editpost.'</div>';
            echo '</ul>';
			echo '</div>';
		}
        
        echo '</div>';
	?>
    </div>
</div>