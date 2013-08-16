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
<link rel="stylesheet" href="http://localhost/baber/assets/css/bootstrap.css">
<div class="container">
    <div class="span12"> 
        <h3 style="text-align: center;">Your Bussiness Profile</h3>
      <div class="span7 offset3 span7-div-form" style="line-height:30px;">
        <form>
             <div class="span7 ">
             <div class="span3" style="padding:0;">
             <label>Photo Link:</label>
            <input type="text" name="photolink" id="required" class="span3"/>
          </div>
        </div>
        <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Address:</label>
            <input type="text" name="address" id="required" class="span3"/>
          </div>
        </div>
         <div class="span7">
                 <div class="span2">
                      <label>City:</label>
                     <input type="text" name="city" id="required"  class="span2"/>
                </div>
                <div class="span2">
                    <label>State:</label>
                    <input type="text" name="state" id="required" class="span2"/>
               </div>
               <div class="span2">
                   <label>Zip:</label>
                   <input type="text" name="zip" id="required" class="span2"/>
               </div>
         </div>
           
           <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Phone:</label>
            <input type="text" name="phone" id="required" class="span3"/>
          </div>
        </div>    
        
         <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Instant Gram:</label>
            <input type="text" name="instantgram" id="required" class="span3"/>
          </div>
        </div>   
        
        
         <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Facebook:</label>
            <input type="text" name="facebook" id="required" class="span3"/>
          </div>
        </div>   
        
         <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Favorites Tool:</label>
            <input type="text" name="favorites_tool" id="required" class="span3"/>
          </div>
        </div>   
        
        
        <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Private:</label>
            <input type="text" name="private" id="required" class="span3"/>
          </div>
        </div>  
        
        <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Slug:</label>
            <input type="text" name="slug" id="required" class="span3"/>
          </div>
        </div>  
        
        
        <div class="span7">
             <div class="span3" style="padding:0;">
             <label>Baber Shop Name:</label>
            <input type="text" name="baber-shop-name" id="required" class="span3"/>
          </div>
        </div>  
        
         <div class="span7">
            <div class="span3">
                 <input type="submit" name="submit"  value="Add" class="span2 btn btn-primary" id="register" style="margin-top: 10px;"/>
            </div>
          </div>
        
        </form>
      
      </div>
                              
</div>

</div>



<?php echo form_close(); ?>

