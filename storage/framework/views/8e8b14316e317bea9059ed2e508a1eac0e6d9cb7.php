<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper mt-7">

        <section class="register-section padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12 mx-auto">
                        <h2><?php echo e(__('Customer Register ')); ?></h2>

                        <?php echo Form::open(['route' => ['store.userstore', $slug]], ['method' => 'post']); ?>

                        <div class="form-group mb-3 mt-2">
                            <label for="fullName" class="form-label mt-2"><?php echo e(__('Full Name')); ?></label>
                            <input name="name" class="form-control" type="text" id="fullName"
                                placeholder="<?php echo e(__('Full Name *')); ?>" required="required">
                        </div>

                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-group mb-3 mt-2">
                        <label for="registerEmail" class="form-label mt-2"><?php echo e(__('Email')); ?></label>
                        <input name="email" class="form-control" id="registerEmail" type="email"
                            placeholder="<?php echo e(__('Email *')); ?>" required="required">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-group mb-3 mt-2">
                        <label for="number" class="form-label mt-2"><?php echo e(__('Number')); ?></label>
                        <input name="phone_number" class="form-control" type="text" placeholder="<?php echo e(__('Number *')); ?>"
                            required="required" id="number">
                    </div>
                    <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-group mb-3 ">
                        <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                        <input name="password" class="form-control" type="password" placeholder="<?php echo e(__('Password *')); ?>"
                            required="required" id="password">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-group mb-3 ">
                        <label for="confirmPassword" class="form-label"><?php echo e(__('Confirm Password')); ?></label>
                        <input name="password_confirmation" class="form-control" type="password"
                            placeholder="<?php echo e(__('Confirm Password *')); ?>" required="required" id="confirmPassword">
                    </div>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error invalid-email text-danger" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="form-group mt-5 mb-3">
                        <p class="m-0"><?php echo e(__('By using the system, you accept the')); ?> <a href=""
                                class="text-primary">
                                <?php echo e(__('Privacy Policy')); ?> </a> <?php echo e(__('and')); ?> <a href=""
                                class="text-primary"> <?php echo e(__('System Regulations.')); ?> </a>
                        </p>
                        <button type="submit" class="btn btn-primary submit-btn mt-3"><?php echo e(__('Register')); ?></button>
                    </div>
                    <?php echo Form::close(); ?>


                    <div class="login-tag text-center mt-5">
                        <p><?php echo e(__('Dont have account ?')); ?> <a href="<?php echo e(route('customer.loginform', $slug)); ?>"
                                class="text-primary"> <?php echo e(__('login now')); ?> </a> </p>
                    </div>
                </div>

                </div>
            </div>
    </div>
    </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('storefront.layout.theme10', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u389444621/domains/viraz.co/public_html/resources/views/storefront/theme10/user/create.blade.php ENDPATH**/ ?>