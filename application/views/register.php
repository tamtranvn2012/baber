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
<meta name="viewport" content="width=device-width">
<!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
<!--<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">-->
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
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="https://github.com/blueimp/jQuery-File-Upload">jQ FURAC</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Demo</a></li>
                    <!--<li><a href="https://github.com/blueimp/jQuery-File-Upload/downloads">Downloads</a></li>
                    <li><a href="https://github.com/blueimp/jQuery-File-Upload">Source Code</a></li>
                    <li><a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Documentation</a></li>
                    <li><a href="https://github.com/blueimp/jQuery-File-Upload/issues">Issues</a></li>-->
                    <li><a href="test/">Test</a></li>
                    <li><a href="https://blueimp.net">&copy; Sebastian Tschan</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<form id="registion_submit" action="register/add_user">
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
		<input type="submit" value="Submit" />
	</form>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="<?php echo base_url('assets');?>/server/php/?user_id_tmp=<?php echo $user_id_tmp; ?>" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing -->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    </form>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <form id="opCrop">
            <button class="btn modal-crop" type="button" id="startResize">
                <i class="icon-resize-horizontal"></i>
                Resize to:
            </button> 
            <a class="btn modal-crop" target="_blank" id="startCrop">
                <i class="icon-th"></i>
                <span>Crop Image to:</span>
            </a> 
            <label for="inWidthCrop">Width</label> <input type="number" name="widthCrop" id="inWidthCrop">
            <label for="inHeightCrop">Height</label> <input type="number" name="heightCrop" id="inHeightCrop">

            <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    Clear
                </button>
        </form>
        <input type="text" id="urlImage">&nbsp;<a class="btn modal-copy">
            <span>Copy to clipboard</span>
        </a>
        <br>
        <a class="btn modal-download" target="_blank">
            <i class="icon-download"></i>
            <span>Download</span>
        </a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
            <i class="icon-play icon-white"></i>
            <span>Slideshow</span>
        </a>
        <a class="btn btn-info modal-prev">
            <i class="icon-arrow-left icon-white"></i>
            <span>Previous</span>
        </a>
        <a class="btn btn-primary modal-next">
            <span>Next</span>
            <i class="icon-arrow-right icon-white"></i>
        </a>
    </div>
</div>
<!-- modal for cropping -->
<div id="croppingModal" class="modal hide" data-width="932" data-height="319">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Crop Image <span class="dimentions"></span></h3>
    </div>
    <div class="modal-body">
        <canvas id="canvasToCrop"></canvas>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn closeModal" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-primary" id="btnDoCrop">Crop</a>
    </div>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
</body> 
</html>
