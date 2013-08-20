<div class="container">
    <div class="row">
    
    <!--begin slider-->

                    <div class="span4 well">
                         <?php echo '<ul>';?>
                            <?php echo '<li class="list"style=" margin-top:20px;" >';?>
                            <a href="<?php echo base_url($username.'/manage/requestapprove/');?>"  target="_blank">Request Post approve on other baber bussiness page</a>
                            
                            <?php echo '</li>';?>
                            
                            <?php
                            foreach($bpidsmanage as $perbpidobj){
                                $approveurl =  base_url($username.'/manage/listapprove/'.$perbpidobj->bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$approveurl.'">Manage approve of profile id='.$perbpidobj->bpid.'</a>';
                                 echo '</li>';
                            }
                            
                            ?>
                            
                            <?php
                            
                            foreach($apidsobjs as $perapidobj){
                                $upid = $perapidobj->upid;
                                $bpid = $perapidobj->bpid;
                                $makeposturl =  base_url($username.'/manage/addnewpost/'.$upid.'/'.$bpid);
                                echo '<li class=" list">';
                                echo '<a href="'.$makeposturl.'">Make new Post on Bussiness profile Id='.$bpid.'</a>';
                                 echo '</li>';
                            }
                            ?>
                            <?php echo '<li class=" list">';?>
                            <a href="<?php echo base_url($username.'/manage/addbussinessprofile');?>">Add New Bussiness Profile</a>
                            <?php echo '</li>';?>
                            
                            <?php echo '<li class="  list">';?>
                            <a href="<?php echo base_url($username.'/manage/addprofile');?>">Add New Profile</a>
                            <?php echo '</li>';?>
                            <?php echo '</ul>';?>
                                
                  </div>
                <!--end slider-->
	<div  class="span8 well" id="form-control-addnewcontent" style="margin-left: 10px;" >
	<h2>Upload a file</h2>
	<!-- Upload function on action form -->
	<?php echo form_open_multipart('/upload/addnew', array('id' => 'fileupload')); ?>
		<div class="span7">
			<label class="span5"> Babershop name:</label>
			<div class="span5"><input type="text" name="babershopname" value=""  class="form-control"/></div>
		</div>
		<div class="span7">
			<label class="span5"> Baber type:</label>
			<div class="span5">
				<select name="baber_type" class="form-control" >
					<option value="babershop">BaberShop</option>
					<option value="hairsalon">Hair Salon</option>
					<option value="stylist">Stylist</option>
				</select>
			</div>
			
		</div>
		<div class="span7">
				<label class="span5"> Baber Name:</label>
				<div class="span5">
					<input type="text" name="babername" value="" class="form-control"/>
				</div>
		</div>
		<div class="span7">
				<label class="span5">Tags(Seperate by comma)</label>
				<div class="span5"><input type="text" name="tags" value="" class="form-control"/>
					<input type="hidden" name="upid" value="<?php echo $upid;?>" />
					<input type="hidden" name="bpid" value="<?php echo $bpid;?>" />
				</div>
		</div>	
	 <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<h4 class="span7">Upload image for this post:</h4>		
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <label style="margin-left: 20px;">User Photo:</label>
    <div class="row fileupload-buttonbar">
        <div class="span5 offset1">
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
    <br/>
    <!-- The table listing the files available for upload/download -->
    <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    <input class="btn btn-success offset2" name="submitnew" type="submit" value="Submit"/>
    <div style="padding-bottom: 20px;"></div>
    <?php echo form_close(); ?>

</div>
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