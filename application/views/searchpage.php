        <div class="container">
                <!-- begin banner-->
                <div class="span12 ">
                    <div class="span2 span2-img " >
                       <a href="#"><img src="<?php echo base_url('assets/images');?>/logo.jpg" alt="" /></a> 
                        <p><a>TapeUps.com</a></p>
                    </div>
                    <div class="span3 offset2 search" >
						<?php echo form_open_multipart('/search/zipcode', array('id' => 'searchzipcodeform')); ?>
							<input type="text" name="zipcode" class="input-large" id="searchbyzipcode"/>
							<input type="submit" value="Search" />
						<?php echo form_close(); ?>
                        <p>Type in Zip Code to Search for Barber</p>
                    </div>
                    <div class="span4 text-right " id="add">
                        <input type="button" value="Add your Barber Shop" class="btn-danger" />
                        
                    </div>
                </div>
                <!--end banner-->
                <!--begin content-->
				<div class="span12">
				<h3>Search results for zipcode : <?php echo $zipcode;?></h3>
				</div>
                <div class="span12">
                    <div class="span11">
                        <input type="button" value="Post Your Pic" name="post-your-pic"/> 
                    </div>
					
					<?php
						$divsep = 1;
						foreach($postresults as $perpost){
							if($divsep == 1){
					?>
								<div class="span12" style="text-align: center;border: none;margin: 0;">
									<p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
										<ul class="inline" >
					<?php
							}
							if(($divsep > 2) && ($divsep%4==1)){
								$divindex = intval($divsep/4)+1;
					?>
								<div class="span12" style="text-align: center;border: none;margin: 0;">
									<p style="padding-top: 20px;">WordWide - Barber Submitted - 6/14/2013</p>
										<ul class="inline" >
					<?php
							}
					?>
											<li>
													<div class="span3-new">
														<p><img src="<?php echo base_url($perpost->photo_img_link);?>" style="width:200px;" /></p>
														<div class=" infomation">
															<p><?php echo $perpost->baber_type;?></p>
															<p><?php echo $perpost->tag;?></p>
															<p><?php echo $perpost->baber_name;?></p>
															<p><?php echo date('Y-m-d h:m',$perpost->created);?></p>
														</div>
													 </div>
											 
											 </li>
					<?php
							if(($divsep > 2) && ($divsep%4==0)){
					?>
										</ul> 
								</div>
					<?php
							}		
							$divsep++;
						};
						$divsep -= 1;
						if ($divsep%4 > 0){
					?>
										</ul> 
								</div>
					<?php
						}
					?>					
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