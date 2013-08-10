        <div class="container">
                <!-- begin banner-->
                <div class="span12 ">
                    <div class="span2 span2-img " >
                       <a href="#"><img src="<?php echo base_url('assets/images');?>/logo.jpg" alt="" /></a> 
                        <p><a>TapeUps.com</a></p>
                    </div>
                    <div class="span3 offset2 search" >
                        <input type="text" name="search" class="input-large" id="search"/>
                        <p>Type in Zip Code to Search for Barber</p>
                    </div>
                    <div class="span4 text-right " id="add">
                        <input type="button" value="Add your Barber Shop" class="btn-danger" />
                        
                    </div>
                </div>
                <!--end banner-->
                <!--begin content-->
                <div class="span12">
                    <div class="span11">
                        <input type="button" value="Post Your Pic" name="post-your-pic"/> 
                    </div>
                   <!--begin span 12-->
                    <div class="span12" style="text-align: center;border: none;margin: 0;">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="inline" >
								<?php
									foreach($photosarrrow1 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<p><img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;" /></p>
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
                     <!--end span 12-->
                   <!--begin span 12-->
                    <div class="span12" style="text-align: center;border: none;margin: 0;">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="inline" >
								<?php
									foreach($photosarrrow2 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<p><img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;" /></p>
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
                     <!--end span 12-->
                   <!--begin span 12-->
                    <div class="span12" style="text-align: center;border: none;margin: 0;">
                        <p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
                            <ul class="inline" >
								<?php
									foreach($photosarrrow3 as $perphotoobj){
								?>
								<li>
                                        <div class="span3-new">
											<p><img src="<?php echo base_url($perphotoobj->photo_img_link);?>" style="width:200px;" /></p>
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
                     <!--end span 12-->

                
        </div>
        <!--end content-->
        <!--begin footer-->
            <div class="span12 footer">
                <div class="span9 offset1 nav" >
                    <ul class="inline">
                        <li class=" well o"><a href="#">Home</a></li>
                        <li class=" well o"><a href="#">About Us</a></li>
                        <li class=" well o"><a href="#">Contact Us</a></li>
                        <li class=" well o"><a href="#">Site map</a></li>
                    </ul>
                </div>
            </div>
         <!--end footer-->       
    </div>