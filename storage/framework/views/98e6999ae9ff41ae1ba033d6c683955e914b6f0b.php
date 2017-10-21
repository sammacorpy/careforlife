<?php $__env->startSection('title','Sign In'); ?>
<?php $__env->startSection('wavecolor','#FF6506'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
 
<?php session_start();
?>


<div class="jumbotron " >
    <?php if(isset($_SESSION['wx089lgout'])): ?>
    <div class="lgoutmsg">
    <CENTER><?php echo e($_SESSION['wx089lgout']); ?></CENTER>
    </div>
    <?php unset($_SESSION['wx089lgout']);
    session_destroy(); ?>

    <?php elseif(isset($_SESSION['pwdchange'])): ?>
    <div class="lgoutmsg">
    <CENTER>Password changed successfully</CENTER>
    </div>
    <?php unset($_SESSION['pwdchange']);
    session_destroy(); ?>


    <?php endif; ?>
</div>

 <div class="container">
    <div class="row formsign">
        <div class="col-sm-5" style="padding-left:50px;padding-right:50px;" id ="switchreg">
        <?php if(count($errors)>0): ?>
            <div style="border:1px solid orange;padding:10px;color:#909090;margin-bottom:5px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($e); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
            <form action="/signin" method="POST" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="legend">Sign In <i class="fa fa-sign-in"></i></div>


                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" value= "<?php echo e(old('username')); ?>" name="username" placeholder="username or Email" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="custombutton btncustom  " value="Sign In">
                    </div>

                    
                    <div class="col-md-6 forgotpass"><a href="/fpwd">Forgot password?</a></div>   

                </div> 
            </form>
       
                    
        </div>
        <div class="col-sm-5 signuptemp">
            <h3>
                Dont't have account?
            </h3>
            

            <p><button class="btncustom signupbtn" id="sgnup">Click Here</button>
            </p>
        </div>
    </div>
    <br>
    <br>
    </div>
    <script src="/js/aj.js">

        
    </script>
    
    
            
          

             <nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | vithealth.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>