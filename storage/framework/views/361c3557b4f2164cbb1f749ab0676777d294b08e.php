<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('wavecolor','#EB4552'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic" rel="stylesheet">     

    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navitems'); ?>
    <?php if(!isset($_SESSION['usrname'])): ?>
        <form class="navbar-form navbar-right" role="search" action="/signin" method="post">
        <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Sign In</button>
        </form>

    <?php else: ?>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item" >
                <a href="#abtuser" class="underline"><?php echo e($_SESSION['usrname']); ?></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="/storage/profimg/<?php echo e($p); ?>" style="margin-top:-5px;padding:0px;border-radius:100%;" width="30" height="30"></a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <li>
                        <a href="e/<?php echo e($_SESSION['usrname']); ?>" style="color:#808080;">Edit profile</a>
                    </li>
                                <li><a href="/logout" style="color:#808080;">Logout</a></li>
        </ul>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    
    <?php if(count($errors)>0): ?>
    <div class="jumbotron">
        <div class="errors">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($e); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    

    <div class="container">

        <div class="row prf" id="abtuser">
            
            
            <div class="col-md-2 rightpart">
                <div>
                    <form enctype="multipart/form-data" method="post" action="/imgupload" id="imageup">
                    <?php echo e(csrf_field()); ?>

                        <img src="/storage/profimg/<?php echo e($p); ?>" class="imgupload" >
                        <div class="changeimg">upload image</div>
                        <input type="file" id="inpfile" class="inpfileupload" name="imgprof">
                        
                    </form>
                </div>
                <div class="nameplate">
                     <?php echo e($username); ?>

                </div>
            </div>
            <?php if(!empty($userdetails)): ?>
            <div class="col-md-6 leftpart">
                <div class="data-content">
                
                    <div class="row profdesk">
                            <b>Name</b>
                            <div class="element"><?php echo e($fname.' '.$lname); ?></div>
                            <b>Blood Group</b>
                            <div class="element"> <?php echo e($userdetails->bloodgrp); ?></div>
                            <?php if($permission==1): ?>
                                <b>Adhar Number</b>
                                <div class="element"><?php echo e($userdetails->adharno); ?></div>
                            <?php endif; ?>
                            <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                            <div class="element"><?php echo e($userdetails->mobile_no); ?></div>
                            <b>Occupation</b>
                            <div class="element"><?php echo e($userdetails->occupation); ?></div>
                            <b>Age</b>
                            <div class="element"><?php echo e(date_diff(date_create(date('y-m-d')),date_create($userdetails->dob))->format('%y')); ?> Years</div>

                    </div>
                    <?php if($permission==1): ?>
                        <div class="row profdesk">
                            <b>Current Address</b>
                            <div class="element"><?php echo e($userdetails->curr_street.', '.$userdetails->curr_city.", ".$userdetails->curr_state.", ".$userdetails->curr_zip.", ".$userdetails->curr_country); ?></div>
                            <b>permanent Address</b>
                            <div class="element"><?php echo e($userdetails->perm_street.', '.$userdetails->perm_city.", ".$userdetails->perm_state.", ".$userdetails->perm_zip.", ".$userdetails->perm_country); ?></div>
                        </div>        
                    <?php endif; ?>
                    

                    
                    <?php if($permission==1): ?>
                        <div class="row profdesk">
                       
                        
                            <b>Guardian</b>
                            <div class="element"><?php echo e($userdetails->guardian_f.' '.$userdetails->guardian_l); ?></div>
                            <b>Contact <i class="fa fa-mobile" aria-hidden="true"></i></b>
                            <div class="element"> <?php echo e($userdetails->guardian_cellno); ?></div>
                        </div>
                    <?php endif; ?>
                

                    

                
                    
                </div>

                <div class="row deldesk">
                    <?php if($permission==1): ?>
                        <a href="e/<?php echo e($_SESSION['usrname']); ?>"><div class="edtprof">Edit profile</div></a>     
                    <?php else: ?>
                        <?php if(isset($_SESSION['usrname'])): ?>
                            <a href="/profile/<?php echo e($_SESSION['usrname']); ?>"><div class="edtprof">View your Profile <i class="fa fa-arrow-right" aria-hidden="true"></i></div></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            
            </div>
            
            <?php else: ?>
                <div class="col-md-10 nedata">
                    Sorry don't have enough data about loll

                    <div class="row deldesk">
                        <?php if($permission==1): ?>
                            <a href="e/<?php echo e($_SESSION['usrname']); ?>"><div class="edtprof">Edit profile</div></a>     
                        <?php else: ?>
                            <?php if(isset($_SESSION['usrname'])): ?>
                                <a href="/profile/<?php echo e($_SESSION['usrname']); ?>"><div class="edtprof">View your Profile <i class="fa fa-arrow-right" aria-hidden="true"></i></div></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            

        </div>

    </div>

    <script src="/js/profile.js">
    </script>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>