<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Blog')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <style>
        .shoping_count:after {
            content: attr(value);
            font-size: 14px;
            background: #273444;
            border-radius: 50%;
            padding: 1px 5px 1px 4px;
            position: relative;
            left: -5px;
            top: -10px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php
    if(!empty(session()->get('lang')))
    {
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;
    }
    $languages=\App\Models\Utility::languages();

    $imgpath=\App\Models\Utility::get_file('uploads/store_logo/');

?>
<?php $__env->startSection('content'); ?>
    <hr>
    <div class="container mt-10">
        <div class="row">
            <div class="card-group">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="<?php echo e(($blogs->count() == 1)?'col-6':'col-lg-4'); ?>">
                        <div class="card border-0 text-white hover-scale-110 hover-shadow-lg overflow-hidden">
                            <figure class="figure">
                                <?php if(!empty($blog->blog_cover_image) && \Storage::exists('uploads/store_logo/'.$blog->blog_cover_image)): ?>
                                    <img alt="Image placeholder" src="<?php echo e($imgpath.$blog->blog_cover_image); ?>" class="img-fluid">
                                <?php else: ?>
                                    <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>" class="img-fluid">
                                <?php endif; ?>
                            </figure>
                            <span class="mask hover-mask bg-dark opacity-7"></span>
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <div class="text-center">
                                    <div class="animate-item--visible opacity-10">
                                        <a href="<?php echo e(route('store.store_blog_view',[$store->slug,$blog->id])); ?>" class="h3 text-white mb-1 stretched-link"><?php echo e($blog->title); ?></a>
                                        <p class="card-text text-white"><?php echo e(\App\Models\Utility::dateFormat($blog->created_at)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            var blog = <?php echo e(sizeof($blogs)); ?>;
            if (blog < 1) {
                window.location.href = "<?php echo e(route('store.slug',$store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme1/store_blog.blade.php ENDPATH**/ ?>