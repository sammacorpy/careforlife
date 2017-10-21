<?php $__env->startSection('title','Sign Up'); ?>
<?php $__env->startSection('wavecolor','#FF6506'); ?>
<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="jumbotron"></div>
 <div class="container">
    <div class="row formsign">
        <div class="col-sm-5" style="padding-left:50px;padding-right:50px;" id ="switchreg">
            <form action="/signin" method="POST" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="legend">Sign In <i class="fa fa-sign-in"></i></div>


                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="username" placeholder="username or Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="custombutton btncustom  " value="Sign In">
                    </div>

                    
                    <div class="col-md-6 forgotpass"><a href="/forgotpassword">Forgot password?</a></div>   

                </div> 
            </form>
       
                    
        </div>
        <div class="col-sm-5 signuptemp">
            <h3>
                Dont't have account?
            </h3>
            

            <p><a href="/signup" class="btncustom signupbtn">Sign up</a>
            </p>
        </div>
    </div>
    <br>
    <br>
    </div>
    <?php if(count($errors)>0): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($e); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
            


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>