<?php $this -> view ("header",$data)?>
<link rel="stylesheet" href="<?=ASSETS?>css/sellerStyle.css">
<link rel="stylesheet" href="<?=ASSETS?>css/common.css">

<section>
    <div class="u-form center">
  <form enctype="multipart/form-data" class="up-form" method="POST">
      <h4>Upload Product</h4>

    <div class="row">
      <div class="col-25">
        <label for="title">Product Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="title" placeholder="Product" required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="file">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="file" name="file" required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="description">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Description" style="height:200px"></textarea>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</section>