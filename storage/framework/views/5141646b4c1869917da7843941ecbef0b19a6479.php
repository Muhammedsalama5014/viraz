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

        article p {
            word-break: break-all;
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
<section class=" my-cart-section product-section pt-3">
    <div class="container mt-7">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <!-- Article body -->
                    <article>
                        <div>
                            <h5 class="float-left"><?php echo e($blogs->title); ?></h5>
                            <span class="float-right"><?php echo e(\App\Models\Utility::dateFormat($blogs->created_at)); ?></span>
                            <span class="clearfix"></span>
                        </div>
                        <figure class="figure mt-0 w-100 text-center">
                            <?php if(!empty($blogs) && \Storage::exists('uploads/store_logo/'.$blogs->blog_cover_image)): ?>
                                <img alt="Image placeholder" src="<?php echo e($imgpath.$blogs->blog_cover_image); ?>" class="img-fluid rounded">
                            <?php else: ?>
                                <img src="<?php echo e(asset(Storage::url('uploads/store_logo/default.jpg'))); ?>" class="img-center img-fluid">
                            <?php endif; ?>
                        </figure>
                        <p class="lead"><?php echo $blogs->detail; ?></p>
                    </article>
                </div>
            </div>
            <?php if(!empty($socialblogs) && $socialblogs->enable_social_button == 'on'): ?>
                <div id="share" class="text-center"></div>
            <?php endif; ?>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            var blog = <?php echo e($blogs); ?>;
            if (blog == '') {
                window.location.href = "<?php echo e(route('store.slug',$store->slug)); ?>";
            }
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('storefront.layout.theme3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme3/store_blog_view.blade.php ENDPATH**/ ?>