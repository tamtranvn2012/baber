<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/13/13
 * Time: 10:55 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/8/13
 * Time: 10:39 AM
 * To change this template use File | Settings | File Templates.
 */


?>
<head xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    <script type="text/javascript">
        function checkEnableSubmit() {
            if (document.getElementById("username").value == "") {
                document.getElementById("register").disabled = true;
            }
            else {
                document.getElementById("register").disabled = false;
                document.getElementById("error").value = "";
            }
        }
    </script>
</head>
<body>
<?php echo form_open_multipart('/user/checkbussiness', array('id' => 'checkbussiness')); ?>

<h3>Register Bussiness</h3>

<label>Username</label>
<input type="text" name="username" style="width: 260px;" id="username"></br>

<label>Password</label>
<input type="password" name="password" style="width: 260px;" id="password">
<!--
add profile of user
-->
<h3>Your Profile</h3>
<label>Photo Link</label>
<input type="text" name="photolink"></br>
<label>Address</label>
<input type="text" name="address"></br>
<label>City</label>
<input type="text" name="city"></br>
<label>State</label>
<input type="text" name="state"></br>
<label>Zip</label>
<input type="text" name="zip"></br>
<label>Phone</label>
<input type="text" name="phone"></br>
<label>Instant Gram</label>
<input type="text" name="instantgram"></br>
<label>Facebook</label>
<input type="text" name="facebook"></br>
<label>Favorites Tool</label>
<input type="text" name="favorites_tool"></br>
<label>Private</label>
<input type="text" name="private"></br>
<label>Baber Shop Name</label>
<input type="text" name="babershopname"></br>
<label>Slug</label>
<input type="text" name="slug"></br>
<button type="submit" class="btn btn-primary" id="register" >Add</button>
<?php echo form_close(); ?>
</body>