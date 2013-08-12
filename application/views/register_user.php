<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/8/13
 * Time: 10:39 AM
 * To change this template use File | Settings | File Templates.
 */


?>
<head>

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
<form action="../check" method="post">

    <h3>Register</h3>
    <table>
        <tr>
            <td><label>Username</label></td>
            <td><input type="text" name="username" style="width: 260px;" id="username" onfocus="checkEnableSubmit()"
                       onblur="checkEnableSubmit()"></td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" name="password" style="width: 260px;" id="password"></td>
        </tr>
        <!--
        add profile of user
        -->
        <tr>
            <td><p></p></td>
        </tr>
        <tr>
            <td><h3>Your Profile</h3></td>
        </tr>

        <tr>
            <td> Address:</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input type="text" name="city"></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><input type="text" name="state"></td>
        </tr>
        <tr>
            <td>Zip:</td>
            <td><input type="text" name="zip"></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>Instant Gram:</td>
            <td><input type="text" name="instantgram"></td>
        </tr>
        <tr>
            <td>Facebook:</td>
            <td><input type="text" name="facebook"></td>
        </tr>
        <tr>
            <td>Favorites Tool:</td>
            <td><input type="text" name="favoritestool"></td>
        </tr>
        <tr>
            <td>Private:</td>
            <td><input type="text" name="private"></td>
        </tr>
        <tr>
            <td>Slug:</td>
            <td><input type="text" name="slug"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit" class="btn btn-primary" id="register" disabled>Add</button>
            </td>
        </tr>
    </table>
</form>
</body>