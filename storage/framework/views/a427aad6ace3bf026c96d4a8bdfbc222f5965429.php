<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('head-title'); ?>
    <?php echo e(__('Welcome') . ', ' . \Illuminate\Support\Facades\Auth::guard('customers')->user()->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if($storethemesetting['enable_header_img'] == 'on'): ?>
        <section class="contain-product container mt-7">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="banner-contain">
                        <h1><?php echo e(__('Products you purchased')); ?></h1>
                        <p>
                        </p>
                        <a href="<?php echo e(route('store.slug', $store->slug)); ?>"
                            class="btn btn-sm btn-secondary btn-icon shadow hover-shadow-lg hover-translate-y-n3"
                            id="pro_scroll">
                            <span class="btn-inner--text"><?php echo e(__('Back to home')); ?></span>
                            <span class="btn-inner--icon">
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    <?php endif; ?>

    <div class="wrapper">
        <?php if(!empty($orders) && count($orders) > 0): ?>
            <div class="container table-responsive py-5">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('Order')); ?></th>
                            <th scope="col" class="sort"><?php echo e(__('Date')); ?></th>
                            <th scope="col" class="sort"><?php echo e(__('Value')); ?></th>
                            <th scope="col" class="sort"><?php echo e(__('Payment Type')); ?></th>
                            <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row">
                                <a href="<?php echo e(route('customer.order', [$store->slug, Crypt::encrypt($order->id)])); ?>"
                                    class="btn btn-sm btn-white btn-icon text-dark">
                                    <span class="btn-inner--text">
                                        <?php echo e($order->order_id[0] == '#' ?  $order->order_id : '#' .$order->order_id); ?>

                                    </span>
                                </a>
                            </th>
                            <td class="order">
                                <span
                                    class="h6 text-sm font-weight-bold mb-0"><?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?></span>
                            </td>
                            <td>
                                <span
                                    class="value text-sm mb-0"><?php echo e(\App\Models\Utility::priceFormat($order->price)); ?></span>
                            </td>
                            <td>
                                <span class="taxes text-sm mb-0"><?php echo e($order->payment_type); ?></span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-end">
                                    <?php if($order->status != 'Cancel Order'): ?>
                                        <button type="button"
                                            class="btn btn-sm btn-status btn-icon <?php echo e($order->status == 'pending' ? 'btn-soft-info' : 'btn-soft-success'); ?>">
                                            <span class="btn-inner--icon">
                                                <?php if($order->status == 'pending'): ?>
                                                    <i class="fas fa-check soft-success"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-check-double soft-success"></i>
                                                <?php endif; ?>
                                            </span>
                                            <?php if($order->status == 'pending'): ?>
                                                <span class="btn-inner--text">
                                                    <?php echo e(__('Pending')); ?>:
                                                    <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="btn-inner--text">
                                                    <?php echo e(__('Delivered')); ?>:
                                                    <?php echo e(\App\Models\Utility::dateFormat($order->updated_at)); ?>

                                                </span>
                                            <?php endif; ?>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-sm btn-status btn-icon">
                                            <span class="btn-inner--icon">
                                                <?php if($order->status == 'pending'): ?>
                                                    <i class="fas fa-check soft-success"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-check-double soft-success"></i>
                                                <?php endif; ?>
                                            </span>
                                            <span class="btn-inner--text">
                                                <?php echo e(__('Cancel Order')); ?>:
                                                <?php echo e(\App\Models\Utility::dateFormat($order->created_at)); ?>

                                            </span>
                                        </button>
                                    <?php endif; ?>
                                    <!-- Actions -->
                                    <div class="actions ml-3">
                                        <a href="<?php echo e(route('customer.order', [$store->slug, Crypt::encrypt($order->id)])); ?>"
                                            class="action-item mr-2" data-toggle="tooltip" data-title="Details"
                                            data-original-title="" title="">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <tr>
                <td colspan="7">
                    <div class="text-center">
                        <i class="fas fa-folder-open text-gray" style="font-size: 48px;"></i>
                        <h2><?php echo e(__('Opps...')); ?></h2>
                        <h6> <?php echo __('No data Found.'); ?> </h6>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme9/customer/index.blade.php ENDPATH**/ ?>