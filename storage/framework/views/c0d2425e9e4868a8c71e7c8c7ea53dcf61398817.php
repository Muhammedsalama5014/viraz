<?php echo e(Form::open(array('url'=>'blog','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('title',__('Title'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Title'),'required'=>'required'))); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="blog_cover_image" class="col-form-label"><?php echo e(__('Blog Cover image')); ?></label>
            
            <input type="file" name="blog_cover_image" id="blog_cover_image" class="form-control" onchange="document.getElementById('blogImg').src = window.URL.createObjectURL(this.files[0])" >
            <img id="blogImg" src="" width="20%" class="mt-2"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('detail',__('Detail'),array('class'=>'col-form-label'))); ?>

        <?php echo e(Form::textarea('detail',null,array('class'=>'form-control summernote-simple','rows'=>3,'placeholder'=>__('Detail')))); ?>

    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/blog/create.blade.php ENDPATH**/ ?>