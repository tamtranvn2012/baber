<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-image-gallery.min.css');?>">
<!-- Jcrop https://github.com/tapmodo/Jcrop -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.Jcrop.css');?>">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.fileupload-ui.css');?>">
<!-- CSS to make adjusments to some layouts of JQ FURAC -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.furac.ui.css');?>">
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url('assets/js/vendor/jquery.ui.widget.js');?>"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo base_url('assets/js/tmpl.min.js');?>"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url('assets/js/load-image.min.js');?>"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url('assets/js/canvas-to-blob.min.js');?>"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-image-gallery.min.js');?>"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url('assets/js/jquery.iframe-transport.js');?>"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url('assets/js/jquery.fileupload.js');?>"></script>
<!-- The File Upload file processing plugin -->
<script src="<?php echo base_url('assets/js/jquery.fileupload-fp.js');?>"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url('assets/js/jquery.fileupload-ui.js');?>"></script>
<!-- The localization script -->
<script src="<?php echo base_url('assets/js/locale.js');?>"></script>
<!-- The other plugins scripts -->
<!-- zClip http://www.steamdev.com/zclip/ -->
<script src="<?php echo base_url('assets/js/jquery.zclip.js');?>"></script>
<!-- Jcrop https://github.com/tapmodo/Jcrop -->
<script src="<?php echo base_url('assets/js/jquery.Jcrop.min.js');?>"></script>
<!-- The main application script -->
<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	
 </head>
<body>
<?php echo form_open_multipart('/manage/submit_property', array('id' => 'submit_new_property')); ?>
	
	<input type="text" name="photo_link" />
	<input type="text" name="photo_tag" />
	<select>
		<option value="babershop">Babershop</option>
		<option value="hairstyle">Hair Style</option>
		<option value="stylist">Stylist</option>
	</select> 	
	<div class="row fileupload-buttonbar">
		<div class="span7">
			<!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn btn-success fileinput-button">
				<span><i class="icon-plus icon-white"></i> Add files...</span>
				<!-- Replace name of this input by userfile-->
				<input type="file" name="userfile">
			</span>
			<button type="submit" class="btn btn-primary start">
				<i class="icon-upload icon-white"></i> Start upload
			</button>

			<button type="reset" class="btn btn-warning cancel">
				<i class="icon-ban-circle icon-white"></i> Cancel upload
			</button>

			<button type="button" class="btn btn-danger delete">
				<i class="icon-trash icon-white"></i> Delete
			</button>

			<input type="checkbox" class="toggle">
		</div>

		<div class="span5">

		<!-- The global progress bar -->
			<div class="progress progress-success progress-striped active fade">
				<div class="bar" style="width:0%;"></div>
			</div>
		</div>
	</div>	
	<input type="hidden" name="private" value="1" />
	<input type="submit" value="Submit" />	
<?php echo form_close(); ?>
</body>