<?php                    
include_once "../models/admin/siteScript.php";
echo '<div class="container-fluid" style="padding-left: 470px;margin-top:98px">
	<div class="card col-lg-6 p-0">
        <div class="title" style="background-color: rgb(111 202 203);">
            <em><h2 class="text-center" style="margin-top: 11px;">' .$systemName. '</h2></em>
        </div>
		<div class="card-body" id="demo">
			<form action="../controller/admin/siteController.php" method="post">
                <div class="form-group">
                    <b><label for="name" class="control-label">System Name</label></b>
                    <input type="text" class="form-control" id="name" name="name" value="' .$systemName. '" required>
                </div>
                <div class="form-group">
                <b><label for="email" class="control-label">Email</label></b>
                    <input type="email" class="form-control" id="email" name="email" value="' .$email. '" required>
                </div>
                <div class="form-group">
                <b><label for="contact" class="control-label">Contact-1</label></b>
                    <input type="tel" class="form-control" id="contact1" name="contact1" value="' .$contact1. '" required>
                </div>
                <div class="form-group">
                <b><label for="contact" class="control-label">Contact-2(optional)</label></b>
                    <input type="tel" class="form-control" id="contact2" name="contact2" value="' .$contact2. '" required>
                </div>
                <div class="form-group">
                <b><label for="address" class="control-label">Address</label></b>
                    <input type="text" class="form-control" id="address" name="address" value="' .$address. '" required>
                </div>
                <center>
                    <button name="updateDetail" class="btn btn-info btn-primary btn-block col-md-3" onclick="loadDoc()">Save</button>
                </center>
            </form>
		</div>
	</div>';    
?>