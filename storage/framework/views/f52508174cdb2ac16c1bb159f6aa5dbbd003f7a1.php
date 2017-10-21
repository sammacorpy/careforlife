<?php $__env->startSection('title','Sign In'); ?>
<?php $__env->startSection('wavecolor','#FF6506'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
 



<div class="jumbotron" >


 
    
</div>

 <div class="container">
    <div class="row formsign">
        <div class="col-sm-offset-3 col-sm-6" style="padding-left:50px;padding-right:50px;" id ="switchreg">
        <?php if(count($errors)>0): ?>
            <div style="border:1px solid orange;padding:10px;color:#909090;margin-bottom:5px;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($e); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
            <form action="/fpwd" method="POST" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="legend">Password Reset <i class="fa fa-lock" aria-hidden="true"></i></div>


                <div class="form-group">
                    <input type="text" class="form-control" id="username" value= "<?php echo e(old('username')); ?>" name="username" placeholder="username or Email" required>
                </div>

                <div class="form-group">
                <input type="submit" class="custombutton btncustom" value="Next" style="width:100px;border-radius:10px 0 10px 0;">
                </div>

                    
                   

                </div> 
            </form>
       
                    
        </div>
        
    </div>
    <br>
    <br>
    </div>
    
    
    
            
          

             <nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | vithealth.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>