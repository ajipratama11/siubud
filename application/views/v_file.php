<!-- Display status message -->
<?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>

<!-- File upload form -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Choose Files</label>
        <input type="file" class="form-control" name="files[]" multiple/>
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
    </div>
</form>

<!-- Display uploaded images -->
<div class="row">
    <h3>Uploaded Files/Images</h3>
    <ul class="gallery">
        <?php if(!empty($files)){ foreach($files as $file){ ?>
        <li class="item">
            <img src="<?php echo base_url('assets/img/'.$file['file_name']); ?>" >
            <p>Uploaded On <?php echo date("j M Y",strtotime($file['uploaded_on'])); ?></p>
        </li>
        <?php } }else{ ?>
        <p>File(s) not found...</p>
        <?php } ?>
    </ul>
</div>