<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Product')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Import')); ?>" data-ajax-popup="true" data-size="lg"
            data-title="<?php echo e(__('Import customer CSV file')); ?>" data-url="<?php echo e(route('product.file.import')); ?>"><i
                class="ti ti-file-import"></i></a>

        <a href="<?php echo e(route('product.export')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Export')); ?>"><i class="ti ti-file-export"></i></a>

        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('List View')); ?>"><i class="fas fa-list"></i></a>

        <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Create Product')); ?>"><i class="ti ti-plus"></i></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card text-white text-center">
                    <div class="card-header border-0 pb-0">
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="<?php echo e(route('product.show', $product->id)); ?>" class="dropdown-item"><i
                                            class="fas fa-eye"></i>
                                        <span><?php echo e(__('View')); ?></span></a>
                                    <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="dropdown-item"><i
                                            class="ti ti-edit"></i>
                                        <span><?php echo e(__('Edit')); ?></span></a>

                                    <a class="bs-pass-para dropdown-item trigger--fire-modal-1" href="#"
                                        data-title="<?php echo e(__('Delete Lead')); ?>" data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                        data-confirm-yes="delete-form-<?php echo e($product->id); ?>">
                                        <i class="ti ti-trash"></i><span><?php echo e(__('Delete')); ?> </span>

                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id], 'id' => 'delete-form-' . $product->id]); ?>

                                    <?php echo Form::close(); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body product_card">
                        <?php if(!empty($product->is_cover)): ?>
                        <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>" target="_blank">
                            <img alt="Image placeholder"
                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                class="img-fluid rounded-circle card-avatar" alt="images">
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" target="_blank">
                            <img alt="Image placeholder"
                                src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>"
                                class="img-fluid rounded-circle card-avatar" alt="images">
                        </a>
                        <?php endif; ?>
                        <h4 class="text-primary mt-2"> <a
                                href="<?php echo e(route('product.show', $product->id)); ?>"><?php echo e($product->name); ?></a></h4>
                        <h4 class="text-muted">
                            <small><?php echo e(\App\Models\Utility::priceFormat($product->price)); ?></small>
                        </h4>
                        <?php if($product->enable_product_variant != 'on'): ?>
                            <?php if($product->quantity == 0): ?>
                                <span class="badge bg-danger p-2 px-3 rounded">
                                    <?php echo e(__('Out of stock')); ?>

                                </span>
                            <?php else: ?>
                                <span class="badge bg-primary p-2 px-3 rounded">
                                    <?php echo e(__('In stock')); ?>

                                </span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="row mt-1">
                            <div class="col-12 col-sm-12">
                                <div>
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php
                                            $icon = 'fa-star';
                                            $color = '';
                                            $newVal1 = $i - 0.5;
                                            if ($product->product_rating() < $i && $product->product_rating() >= $newVal1) {
                                                $icon = 'fa-star-half-alt';
                                            }
                                            if ($product->product_rating() >= $newVal1) {
                                                $color = 'text-warning';
                                            } else {
                                                $color = 'text-black';
                                            }
                                        ?>
                                        <i class="fas <?php echo e($icon . ' ' . $color); ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('product.create')); ?>" class="btn-addnew-project" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create Product')); ?>"><i class="ti ti-plus text-white"></i>
                <div class="bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2">New Product</h6>
                <p class="text-muted text-center">Click here to add New Product</p>
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/product/grid.blade.php ENDPATH**/ ?>