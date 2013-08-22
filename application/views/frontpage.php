        <div class="container">
                <!-- begin banner-->
                <div class="row" style="border: 1px red solid;">
                    <div class="col-md-3 span2-img" >
                       <a href="#"><img src="<?php echo base_url('assets/images');?>/logo.jpg" alt="" /></a> 
                        <p><a>TapeUps.com</a></p>
                    </div>
                    <div class="col-md-5 search " >
						<?php echo form_open_multipart('/search/zipcode', array('id' => 'searchzipcodeform')); ?>
							<input type="text" name="zipcode" class=" span3 input-large form-control" id="searchbyzipcode"style="margin-top: 5px;"/>
							<input type="submit" value="Search" class="btn btn-primary" style="margin-left: 5px;margin-top: 5px;" />
						<?php echo form_close(); ?>
                        <br />
                        <p style="margin-left: 30px;">Type in Zip Code to Search for Barber</p>
                    </div>
                    <div class="col-md-3 pull-right" id="add" style="padding-top: 10px;">
						<a href="<?php echo base_url('/user/login');?>"><input type="button" value="Login to your account" class="btn-danger" /></a><br/>
						<a href="<?php echo base_url('/user/register');?>"><input type="button" value="Add your Barber Shop" class="btn-danger" /></a><br/>
                    </div>
                </div>
                <!--end banner-->
                <!--begin content-->
                <div class="row" style="border: 1px red solid;">
                    <div class="span11">
                        <input type="button" value="Post Your Pic" name="post-your-pic"/> 
                    </div>
                   <!--begin row-->
                    <div class="row row-content">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="list-inline" >
								<?php
									foreach($photosarrrow1 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;height: 200px;" />
                                            <div class=" infomation">
                                                <p><?php echo $perphotoobj->baber_type;?></p>
                                                <p><?php echo $perphotoobj->tag;?></p>
                                                <p><?php echo $perphotoobj->baber_name;?></p>
                                                <p><?php echo date('Y-m-d h:m',$perphotoobj->created);?></p>
                                            </div>
                                         </div>
                                 
                                 </li>
								<?php } ?>
                            </ul> 
                    </div>
                     <!--end row-->
                   <!--begin span 12-->
                    <div class="row row-content">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="list-inline" >
								<?php
									foreach($photosarrrow2 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;height: 200px;" />
                                            <div class=" infomation">
                                                <p><?php echo $perphotoobj->baber_type;?></p>
                                                <p><?php echo $perphotoobj->tag;?></p>
                                                <p><?php echo $perphotoobj->baber_name;?></p>
                                                <p><?php echo date('Y-m-d h:m',$perphotoobj->created);?></p>
                                            </div>
                                         </div>
                                 
                                 </li>
								<?php } ?>
                            </ul> 
                    </div>
                     <!--end row-->
                   <!--begin row-->
                    <div class="row row-content">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="list-inline" >
								<?php
									foreach($photosarrrow3 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;height: 200px;" />
                                            <div class="infomation">
                                                <p><?php echo $perphotoobj->baber_type;?></p>
                                                <p><?php echo $perphotoobj->tag;?></p>
                                                <p><?php echo $perphotoobj->baber_name;?></p>
                                                <p><?php echo date('Y-m-d h:m',$perphotoobj->created);?></p>
                                            </div>
                                         </div>
                                 
                                 </li>
								<?php } ?>
                            </ul> 
                    </div>
                     <!--end span 12-->

                
        </div>
        <!--end content-->
        <!--begin footer-->
            <div class="row footer" style="border: 1px red solid;">
                <div class="span9 offset1 nav" >
                    <ul class="list-inline">
                        <li class=" well o"><a href="#">Home</a></li>
                        <li class=" well o"><a href="#">About Us</a></li>
                        <li class=" well o"><a href="#">Contact Us</a></li>
                        <li class=" well o"><a href="#">Site map</a></li>
                    </ul>
                </div>
            </div>
         <!--end footer-->       
    </div>