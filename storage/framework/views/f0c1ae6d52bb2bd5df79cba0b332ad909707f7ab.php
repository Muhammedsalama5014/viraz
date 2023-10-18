<?php $__env->startSection('page-title'); ?>
    <?php echo e(ucfirst($pageoption->name)); ?>

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

        .pagedetails {
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
?>
<?php $__env->startSection('content'); ?>
<div class="main-content position-relative bg-white">
    <div class="container">
        <div class="row">
            <div class="card-group mt-9">
                <div class="page-title">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto mb-md-0">
                            <div class="d-inline-block">
                                <h5 class="h4 d-inline-block font-weight-bold mb-0 pt-4"> <?php echo e(ucfirst($pageoption->name)); ?></h5>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="mt-4 pagedetails">
                        <?php echo $pageoption->contents; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('storefront.layout.theme1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme1/pageslug.blade.php ENDPATH**/ ?>