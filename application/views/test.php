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

<div id="upload-img">
	<h2>Upload a file</h2>
	<!-- Upload function on action form -->
	<?php echo form_open_multipart('/upload/upload_img', array('id' => 'fileupload')); ?>
		<input type="text" name="firstname" value="" />
		<input type="text" name="lastname" value="" />
		<input type="text" name="babershopname" value="" />
		<input type="text" name="address" value="" />
		<input type="text" name="city" value="" />
		<input type="text" name="state" value="" />
		<input type="text" name="zip" value="" />
		<input type="text" name="phonenumber" value="" />
		<input type="text" name="instagram" value="" />
		<input type="hidden" name="hiddenval" value="test hidden value" />
		
	<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
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

	<!-- The loading indicator is shown during image processing -->
	<div class="fileupload-loading"></div>
	<br>
	<!-- The table listing the files available for upload/download -->
	<table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
	<input type="submit" value="Submit" />	
	<?php echo form_close(); ?>

</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
<!-- The template text-tmpl upload/download -->

...
...

</body>
</html>