<div class="modal fade" id="updateCat<?php echo $categoryId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $categoryId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateCat<?php echo $categoryId; ?>">Category Id: <b><?php echo $categoryId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
      <div class="modal-body">
        <form action="../models/admin/category.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="catimage" id="catimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="catId" name="catPhotoId" value="<?php echo $categoryId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/assets/img/card-<?php echo $categoryId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
				</div>
			</div>
		</form>
        <form action="../models/admin/category.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $categoryName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $categoryDesc; ?></textarea>
            </div>
            <input type="hidden" id="catId" name="catId" value="<?php echo $categoryId; ?>">
            <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>