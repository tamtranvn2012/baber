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
            <a href="<?php echo base_url('/user/login');?>"><input type="button" value="Login to your account" class="btn-danger" /></a>
            <a href="<?php echo base_url('/user/register');?>"><input type="button" value="Add your Barber Shop" class="btn-danger" /></a>
            <a href="<?php
            $username = $this->uri->segment(1, 0);
            echo base_url('/'.$username.'/manage/addprofile');?>"><input type="button" value="Create your bussiness profile" class="btn-danger" /></a>

        </div>
    </div>
    <!--begin content-->
    <div class="span12">
        <!--begin span 12-->
        <div class="span12" style="text-align: center;border: none;margin: 0;">

            <ul class="inline" >
                <p style="padding-top: 20px;">Posts of yourseft</p>
                <?php
                if($postapprovide){
                foreach($postapprovide as $key){
                    ?>
                    <li>
                        <div class="span3-new">
                            <p><img src="<?php echo base_url($key->photo_img_link);?>" style="width:200px;" /></p>
                            <div class=" infomation">
                                <p><?php echo $key->baber_type;?></p>
                                <p><?php echo $key->tag;?></p>
                                <p><?php echo $key->baber_name;?></p>
                                <p><?php echo date('Y-m-d h:m',$key->created);?></p>
                                <p><?php echo $key->babershopname;?></p>
                                <p><?php echo "<a href='../follows/$key->ppid'>follows</a>"?></p>
                                <p><?php echo "<a href='../unfollows/$key->ppid''>unfollows</a>"?></p>
                            </div>
                        </div>
                    </li>
                <?php }
                }?>
            </ul>
        </div>
        <!--end span 12-->
            <!--begin span 12-->
            <div class="span12" style="text-align: center;border: none;margin: 0;">


                <ul class="inline" >
                    <p style="padding-top: 20px;">Posts of some another people</p>
                    <?php
                    if($postapprovide1){
                    foreach($postapprovide1 as $key){
                        ?>
                        <li>
                            <div class="span3-new">
                                <p><img src="<?php echo base_url($key->photo_img_link);?>" style="width:200px;" /></p>
                                <div class=" infomation">
                                    <p><?php echo $key->baber_type;?></p>
                                    <p><?php echo $key->tag;?></p>
                                    <p><?php echo $key->baber_name;?></p>
                                    <p><?php echo date('Y-m-d h:m',$key->created);?></p>
                                    <p><?php echo $key->babershopname;?></p>
                                    <p><?php echo "<a href='../follows/$key->ppid'>follows</a>"?></p>
                                    <p><?php echo "<a href='../unfollows/$key->ppid''>unfollows</a>"?></p>
                                </div>
                            </div>
                        </li>
                    <?php }} ?>
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

