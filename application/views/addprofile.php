<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/14/13
 * Time: 10:30 AM
 * To change this template use File | Settings | File Templates.
 */


?>
<?php
$username = $this->uri->segment(1, 0);
echo form_open_multipart('/'.$username.'/manage/profilebussiness', array('id' => 'profilebussiness')) ?>
<div class="container">
    <div class="row"> 
                <!--begin slider-->
	<div class="span4 well">
		Left SideBar here
	</div>
                <!--end slider-->
				  <div class="span8 well" style="line-height:30px;margin-left: 10px;">
				  <h3 style="text-align: center;">Your Bussiness Profile</h3>
					<form>
    				 <div class="span7" style="margin:0;">
            				<label class="span5">Address:</label>
            				<div class="span5"><input type="text" name="address" class="span3 form-control"/></div>
    			     </div>
					<div class="span7" style="margin:0;">
    					<div class="span2">
    						<label>City:</label>
    						<div class="span2" style="margin: 0;"><input type="text" name="city" class="span2 form-control"/></div>
    					</div>
    					<div class="span2" >
    						<label>State:</label>
    						<div class="span2"  style="margin: 0;"><input type="text" name="state" class="span2 form-control "/></div>
    					</div>
    					<div class="span2" >
    						<label>Zipcode:</label>
    						<div class="span2" style="margin: 0;"><input type="text" name="zip" class="span2 form-control"/></div>
    					</div>
		          	</div>
	                <div class="span7" style="margin:0;">
        				<label class="span5">Phone:</label>
        				<div class="span5"><input type="text" name="phone" class="span3 form-control"/></div>
			         </div>
					   
					 <div class="span7" style="margin:0;">
						 <label class="span5">Instant Gram:</label>
						<div class="span5"><input type="text" name="instantgram" id="required" class="span3 form-control"/></div>
					</div>   
					
					
					 <div class="span7" style="margin:0;">
						
						 <label class="span5">Facebook:</label>
					<div class="span5"><input type="text" name="facebook" id="required" class="span3 form-control"/></div>
					  </div>
				  
					
					 <div class="span7" style="margin:0;">
						 
						 <label class="span5">Favorites Tool:</label>
						<div class="span5"><input type="text" name="favorites_tool" id="required" class="span3 form-control"/></div>
					</div>   
					
					
					<div class="span7" style="margin:0;">
						 
						 <label class="span5">Private:</label>
					<div class="span5">	<input type="text" name="private" id="required" class="span3 form-control"/></div>
					</div>  
					
					<div class="span7" style="margin:0;">
					
						 <label class="span5">Slug:</label>
						<div class="span5"><input type="text" name="slug" id="required" class="span3 form-control"/>
					  </div>
					</div>  
					
					
					<div class="span7" style="margin:0;">
						 <label class="span5">Baber Shop Name:</label>
						<div class="span5"><input type="text" name="baber-shop-name" id="required" class="span3 form-control"/>
					  </div>
					</div>  
					
					 <div class="span7" style="margin:0;">
						<div class="span5">
							 <input type="submit" name="submit"  value="Add" class="span2 btn btn-primary" id="register" style="margin-top: 10px;"/>
						</div>
					  </div>
					
					</form>
				  
				  </div>
										  
</div>

</div>

<?php echo form_close(); ?>