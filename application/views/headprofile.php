<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload, Resize and Crop Plugin Demo 0.1
 * https://github.com/baamenabar/jQuery-File-Upload-and-Crop
 *
 * Copyright 2012, Agustín Amenabar
 * https://medula.cl
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

* BASED Sebastian Tschan's jQuery File Upload Plugin

/*
 * jQuery File Upload Plugin Demo 6.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta charset="utf-8">
<title>jQ FURAC &ndash; jQuery File Upload, Resize &amp; Crop Demo</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bar and preview images for jQuery. Supports cross-domain, chunked and resumable file uploads. Works with any server-side platform (Google App Engine, PHP, Python, Ruby on Rails, Java, etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width"/>
<!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>"/>
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<!--<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-image-gallery.min.css');?>"/>-->
<!-- Jcrop https://github.com/tapmodo/Jcrop -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.Jcrop.css');?>">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.fileupload-ui.css');?>">
<!-- CSS to make adjusments to some layouts of JQ FURAC -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.furac.ui.css');?>">
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

     	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.shadow.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ifixpng.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.fancyzoom.min.js');?>"></script>
        <script type="text/javascript">
			$(function(){
				$('#demo>a:first').fancyzoom({Speed:400,showoverlay:false});
				$('#demo>a:last').fancyzoom({Speed:400,showoverlay:false});
				$('.nooverlay').fancyzoom({Speed:400,showoverlay:false});
				$('img.fancyzoom').fancyzoom();
			});
		</script>	
        

</head>
<body>
<!-- -->
<div class="container">
                <!-- begin banner-->
                <div class="span12 ">
                    <div class="span2 span2-img " >
                       <a href="#"><img src="<?php echo base_url('assets/images/logo.jpg"');?>" alt="" /></a> 
                        <p><a>TapeUps.com</a></p>
                    </div>
                    <div class="span5 offset4 span5-nav-top">
                        <ul class="inline">
                            <li class="well"><a href="#">Find a Barber</a></li>
                            
                            <li class="well"><a href="# ">Add Your Shop</a></li>
                           
                            <li class="well"><a>Post Your Pic</a></li>
                            
                            <li class="" style="margin-left: 10px;"><a href="#">Login</a></li>
                            
                            <li class="" ><a href="#">Register</a></li>
                        </ul>
                        
                    </div>
                </div>
                <!--end banner-->
                <!--begin content-->
                    <div class="span12">
                        <div class="span3 span3-left">
                                
                                <ul class="inline">
                                <li class="span3" style="margin: 0; padding-bottom:10px;"><a href="#"><img  src="<?php echo base_url('assets/images/anhcuoi.jpg');?>" /></a></li>
                                    <li><p>5 HairCuts in 2013</p></li>
                                    <li style="padding-left: 30px;"><input type="button" class="btn-danger" value="Friend"/></li>
                                </ul> 

                             <p>My Barber</p>
                                <ul class="inline">
                                    <li class="span2" style="margin: 0;"><a href="#"><img  src="<?php echo base_url('assets/images/1.jpg');?>" alt=""/></a> </li>
                                    <li><p>All the Barber</p></li>
                                </ul>

                        </div>
                        
                            <div class="span9 span9-right" >
                					<ul class="inline "> 
                                        <li>
                                                <a class="nooverlay" href="<?php echo base_url('assets/images/1.jpg');?>"><img alt="An image zoomed !!" src="<?php echo base_url('assets/images/1-small.jpg');?>"/><br/></a>
                                                <ul class="unstyled">
                                                    <li>Type Of Hair Style</li>
                                                    <li>Barber</li>
                                                    <li>Tags</li>
                                                    <li>Date</li>
                                                    <li>Likes 82</li>
                                                </ul>
                                        
                                        </li>
                                        <li>
                                                <a class="nooverlay" href="<?php echo base_url('assets/images/2.jpg');?>"><img src="<?php echo base_url('assets/images/2-small.jpg');?>"/></a>
                                                <ul class="unstyled">
                                                    <li>Type Of Hair Style</li>
                                                    <li>Barber</li>
                                                    <li>Tags</li>
                                                    <li>Date</li>
                                                    <li>Likes 82</li>
                                                </ul>
                                        
                                        </li>
                                        <li>
                                                <a class="nooverlay" href="<?php echo base_url('assets/images/3.jpg');?>"><img src="<?php echo base_url('assets/images/3-small.jpg');?>"/></a>
                                                 <ul class="unstyled">
                                                    <li>Type Of Hair Style</li>
                                                    <li>Barber</li>
                                                    <li>Tags</li>
                                                    <li>Date</li>
                                                    <li>Likes 82</li>
                                                </ul>
                                        
                                        </li>
                                        <li>
                                            <a class="nooverlay" href="<?php echo base_url('assets/images/4.jpg');?>"><img src="<?php echo base_url('assets/images/4-small.jpg');?>"/></a>
                                             <ul class="unstyled">
                                                <li>Type Of Hair Style</li>
                                                <li>Barber</li>
                                                <li>Tags</li>
                                                <li>Date</li>
                                                <li>Likes 82</li>
                                            </ul>
                                        
                                        </li>
                                    
                                   
                                   
                                    <div class="span7"  id="span7-comment" style="padding-top: 40px;">
                                         <label class="input-medium">Your Name:</label>   
                                        <input type="text" class="input-xlarge"/>
                                    </div>
                                    <div class="span7" id="span7-comment">
                                         <label class="input-medium">Your Email:</label>   
                                        <input type="text" class="input-xlarge"/>
                                    </div>
                                    <div class="span7" id="span7-comment">
                                        <label class="input-medium">Your Feedback:</label> 
                                        <textarea class="input-xlarge"></textarea>
                                    </div>
                                   
                                   
                                   
                                    </div>
                        
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
<!-- -->

</body> 
</html>
