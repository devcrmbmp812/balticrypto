
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?> Team information <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.bottom_fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="dashboard-body">
        <div class="team-top">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Management</h2>
                        </div>
                    </div>

                    <?php $__currentLoopData = $founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="team-box">
                            <div class="pic">
                                <img src="<?php echo e(asset('assets/images/user/team_member').'/'.$key->image); ?>" alt="<?php echo e($key->name); ?>">
                                <div class="social_media_team">
                                    <ul class="team_social">
                                        <li><a href="<?php echo e('mailto:'.$key->email); ?>"><i class="fa fa-envelope"></i></a></li>
                                        <li><a href="<?php echo e($key->fblink); ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo e($key->telegram); ?>"><i class="fa fa-send"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-prof">
                                <h3 class="post-title details-font color-darkblue"><?php echo e($key->name); ?></h3>
                                <h3 class="designation"><?php echo $key->designation; ?></h3>
                                <img src="assets/images/poly.png"/>
                                <?php echo $key->description; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
        <div class="team-second">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Technical Team</h2>
                        </div>
                    </div>
                    <?php $__currentLoopData = $technical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="team-box">
                                <div class="pic">
                                    <img src="<?php echo e(asset('assets/images/user/team_member').'/'.$key->image); ?>" alt="<?php echo e($key->name); ?>">
                                    <div class="social_media_team">
                                        <ul class="team_social">
                                            <li><a href="<?php echo e('mailto:'.$key->email); ?>"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="<?php echo e($key->fblink); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo e($key->telegram); ?>"><i class="fa fa-send"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-prof">
                                    <h3 class="post-title details-font color-darkblue"><?php echo e($key->name); ?></h3>
                                    <h3 class="designation"><?php echo $key->designation; ?></h3>
                                    <img src="assets/images/poly.png"/>
                                    <?php echo $key->description; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="team-third">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title mt-5">
                                    <h2 class="text-center">Creative Team</h2>
                                </div>
                            </div>
                            <?php $__currentLoopData = $creative; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="team-box">
                                        <div class="pic">
                                            <img src="<?php echo e(asset('assets/images/user/team_member').'/'.$key->image); ?>" alt="<?php echo e($key->name); ?>">
                                            <div class="social_media_team">
                                                <ul class="team_social">
                                                    <li><a href="<?php echo e('mailto:'.$key->email); ?>"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a href="<?php echo e($key->fblink); ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="<?php echo e($key->telegram); ?>"><i class="fa fa-send"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="team-prof">
                                            <h3 class="post-title details-font color-darkblue"><?php echo e($key->name); ?></h3>
                                            <h3 class="designation"><?php echo $key->designation; ?></h3>
                                            <img src="assets/images/poly.png"/>
                                            <?php echo $key->description; ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-second">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Support</h2>
                        </div>
                    </div>
                    <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="team-box">
                                <div class="pic">
                                    <img src="<?php echo e(asset('assets/images/user/team_member').'/'.$key->image); ?>" alt="<?php echo e($key->name); ?>">
                                    <div class="social_media_team">
                                        <ul class="team_social">
                                            <li><a href="<?php echo e('mailto:'.$key->email); ?>"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="<?php echo e($key->fblink); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo e($key->telegram); ?>"><i class="fa fa-send"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-prof">
                                    <h3 class="post-title details-font color-darkblue"><?php echo e($key->name); ?></h3>
                                    <h3 class="designation"><?php echo $key->designation; ?></h3>
                                    <img src="assets/images/poly.png"/>
                                    <?php echo $key->description; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="team-last">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title mt-5">
                                    <h2 class="text-center">Advisors</h2>
                                </div>
                            </div>
                            <?php $__currentLoopData = $advisors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="team-box">
                                        <div class="pic">
                                            <img src="<?php echo e(asset('assets/images/user/team_member').'/'.$key->image); ?>" alt="<?php echo e($key->name); ?>">
                                            <div class="social_media_team">
                                                <ul class="team_social">
                                                    <li><a href="<?php echo e('mailto:'.$key->email); ?>"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a href="<?php echo e($key->fblink); ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="<?php echo e($key->telegram); ?>"><i class="fa fa-send"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="team-prof">
                                            <h3 class="post-title details-font color-darkblue"><?php echo e($key->name); ?></h3>
                                            <h3 class="designation"><?php echo $key->designation; ?></h3>
                                            <img src="assets/images/poly.png"/>
                                            <?php echo $key->description; ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .inner-page .header-bottom {
        background: #cacaca;
    }
    .inner-page ~ .dashboard-body {
        background-color: #cacaca;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>