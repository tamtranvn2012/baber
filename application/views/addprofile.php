<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chicken
 * Date: 8/14/13
 * Time: 10:30 AM
 * To change this template use File | Settings | File Templates.
 */


?>
<?php
$username = $this->uri->segment(1, 0);
echo form_open_multipart('/'.$username.'/manage/profilebussiness', array('id' => 'profilebussiness')) ?>

<tr>
    <td><h3>Your Bussiness Profile</h3></td>
</tr>
<tr>
    <td> Photo Link:</td>
    <td><input type="text" name="photolink" class="required"></td>
</tr>
<tr>
    <td> Address:</td>
    <td><input type="text" name="address" class="required"></td>
</tr>
<tr>
    <td>City:</td>
    <td><input type="text" name="city" class="required"></td>
</tr>
<tr>
    <td>State:</td>
    <td><input type="text" name="state" class="required"></td>
</tr>
<tr>
    <td>Zip:</td>
    <td><input type="text" name="zip" class="required"></td>
</tr>
<tr>
    <td>Phone:</td>
    <td><input type="text" name="phone" class="required"></td>
</tr>
<tr>
    <td>Instant Gram:</td>
    <td><input type="text" name="instantgram" class="required"></td>
</tr>
<tr>
    <td>Facebook:</td>
    <td><input type="text" name="facebook" class="required"></td>
</tr>
<tr>
    <td>Favorites Tool:</td>
    <td><input type="text" name="favorites_tool" class="required"></td>
</tr>
<tr>
    <td>Private:</td>
    <td><input type="text" name="private" class="required"></td>
</tr>
<tr>
    <td>Slug:</td>
    <td><input type="text" name="slug" class="required"></td>
<tr>
    <td>Baber Shop Name:</td>
    <td><input type="text" name="babershopname" class="required"></td>
</tr>
</tr>
<tr>
    <td colspan="2" align="center">
        <button type="submit" class="btn btn-primary" id="register">Add</button>
    </td>
</tr>
</table>
<?php echo form_close(); ?>

