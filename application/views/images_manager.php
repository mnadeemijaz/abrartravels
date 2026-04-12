<?php



?>
    <!-- <link rel="stylesheet" href="<?php echo base_url()?>front/css/bootstrap.min.css" type="text/css" /> -->
    <style>
        .gallery-img {
            width: 180px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .gallery-row {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Images Manager
        <small>Update Images</small>
      </h1>
    </section>
    
    <section class="content">


        <h2>Images Manager</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Gallery Images</h3>
                <form action="<?php echo isset($edit) && $edit ? base_url('Configration/edit_image/'.$image->id) : base_url('Configration/store_images'); ?>" method="post" enctype="multipart/form-data" class="mb-4">
                    <div class="form-group">
                        <label for="image">Select Image to Upload</label>
                        <input type="file" name="image" id="image" class="form-control-file" <?php echo (isset($edit) && $edit) ? '' : 'required'; ?>>
                        <input type="hidden" name="type" value="gallery">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo (isset($edit) && $edit) ? 'Update Image' : 'Upload Image'; ?></button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Packages Images</h3>
                <form action="<?php echo isset($edit) && $edit ? base_url('Configration/edit_image/'.$image->id) : base_url('Configration/store_images'); ?>" method="post" enctype="multipart/form-data" class="mb-4">
                    <div class="form-group">
                        <label for="image">Select Image to Upload</label>
                        <input type="file" name="image" id="image" class="form-control-file" <?php echo (isset($edit) && $edit) ? '' : 'required'; ?>>
                        <input type="hidden" name="type" value="packages">
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo (isset($edit) && $edit) ? 'Update Image' : 'Upload Image'; ?></button>
                </form>
            </div>
        </div>

    
        <h4>Gallery</h4>
        <div class="gallery-row">
            <?php if(!empty($images)) { foreach($images as $img) { ?>
                <div style="text-align:center; margin:10px;">
                    <img src="<?php echo base_url('assets/images/'.$img->filename); ?>" class="gallery-img" alt="Image"><br>
                    <!-- <a href="<?php echo base_url('Configration/edit_image/'.$img->id); ?>" class="btn btn-sm btn-info mt-2">Edit</a> -->
                    <form action="<?php echo base_url('Configration/delete_image/'.$img->id); ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="return confirm('Are you sure you want to delete this image?');">Delete</button>
                    </form>
                </div>
            <?php }} else { ?>
                <p>No images uploaded yet.</p>
            <?php } ?>
        </div>
        <h4>Packages</h4>
        <div class="gallery-row">
            <?php if(!empty($packages)) { foreach($packages as $img) { ?>
                <div style="text-align:center; margin:10px;">
                    <img src="<?php echo base_url('assets/images/'.$img->filename); ?>" class="gallery-img" alt="Image"><br>
                    <!-- <a href="<?php echo base_url('Configration/edit_image/'.$img->id); ?>" class="btn btn-sm btn-info mt-2">Edit</a> -->
                    <form action="<?php echo base_url('Configration/delete_image/'.$img->id); ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="return confirm('Are you sure you want to delete this image?');">Delete</button>
                    </form>
                </div>
            <?php }} else { ?>
                <p>No images uploaded yet.</p>
            <?php } ?>
        </div>
    </section>
</div>
