<form method="post" enctype="multipart/form-data">
     <input type="file" id="imagetoresize" name="imagetoresize" value="" class="field1" /> 
     <input type="button" onclick="updatebgimage()" value="UploadBGImage" /> 
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
function updatebgimage()
    {   
        regexp = /^[^[\]]+/;
        var imgfile = document.getElementById("imagetoresize"); 
        var fileInputName = regexp.exec( imgfile['name'] ); 
        formdata = new FormData(); 
         formdata.append("imagetoresize",imgfile.files[0]);  
		//formdata.append("imagetoresize",imgfile.files);
        $.ajax({  
            url: "<?php echo site_url('upload/uploadbgimage'); ?>",  
            type: "POST",  
            data: formdata,  
            dataType: "json",
            processData: false,  
            contentType: false,  
            success: function (data) {  
                    alert(data.message); 
            }  
        });  
    } 
</script>