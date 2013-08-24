<div class="container">
<div class="row">
<!--begin sider-->
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
                <!--end sider-->
    <div class="span7 well">
        	<?php
		foreach($allinfoposts as $perpostinfo){
			$deleteposturl = '/'.$username.'/manage/posts/delete/'.$perpostinfo->ppid;
			$editposturl = '/'.$username.'/manage/posts/edit/'.$perpostinfo->ppid;
			$deletepost = '<a href="'.base_url($deleteposturl).'">Delete this post</a>';
			$editpost = '<a href="'.base_url($editposturl).'">Edit this post</a>';
		
            echo '<ul class="span3">';
            echo '<li>';
			echo '<li>'.'Babershop name:'.$perpostinfo->babershopname.'</li>';
			echo '<li>'.'Photo id:'.$perpostinfo->photo_id.'</li>';
			echo '<li>'.'Baber type:'.$perpostinfo->baber_type.'</li>';
			echo '<li>'.$deletepost.'</li>';
			echo '<li>'.$editpost.'</li>';
            echo '</ul>';
		}

	?>
    </div>
    </div>
</div>