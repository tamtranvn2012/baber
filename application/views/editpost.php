<?php
	$ppid = $postinfo->ppid;
	$photo_id = $postinfo->photo_id;
	$babershopname = $postinfo->babershopname;
	$baber_type = $postinfo->baber_type;
	$baber_name = $postinfo->baber_name;
	$tag = $postinfo->tag;
	$isprivate = $postinfo->isprivate;
?>
<div class="edit-post">
	<div id="upload-img">
		<h3>Fill New User Info</h3>
		<!-- Upload function on action form -->
		<?php echo form_open_multipart('/upload/uploadeditpost/', array('id' => 'fileupload')); ?>
			<label>Babershop name:</label>
				<input type="text" name="babershopname" value="<?php echo $babershopname;?>"/>		
			<br/>
			<label>Babertype</label>
				<input type="text" name="baber_type" value="<?php echo $baber_type;?>"/>		
			<br/>
			<label>Baber Name:</label>
				<input type="text" name="baber_name" value="<?php echo $baber_name;?>"/>		
			<br/>
			<label>Tags:</label>
				<input type="text" name="tags" value="<?php echo $tag;?>"/>		
			<br/>
			<label>Private:</label>
				<input type="checkbox" name="isprivate" value="1" <?php if($isprivate){echo 'checked="checked"';}?>>
			<br/>
			<label>Photo:</label>
				<img src="<?php echo base_url($photo_id);?>" style="width:200px;"/>
			<br/>
			<input type="hidden" name="ppid" value="<?php echo $ppid;?>"/>
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<label>User Photo:</label>
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
		<input class="btn btn-success" name="submitedit" type="submit" value="Submit" />	
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
</div>