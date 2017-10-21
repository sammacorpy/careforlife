<?php $__env->startSection('title','verify'); ?>
<?php $__env->startSection('wavecolor','#FF6506'); ?>
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/signupstyle.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
 


<div class="jumbotron">
    <?php if(isset($_SESSION['verif#09'])): ?>
        <div class="lgoutmsg">
            <CENTER>"You have successfully verified your account"</CENTER>
        </div>
        <?php
            unset($_SESSION['verif#09']);
        ?>
</div>
<div class="container" >
    <div class="row">
        
            
                <br>
                <br>

                <center><a id="signinlink" href="/signin" class="custombutton btncustom" style="position:absolute;display:inline-block;top:0;bottom:0;left:0;right:0;margin:auto;width:100px;height:40px;">Sign In</a></center>
            <?php else: ?>

                <br>
                <br>

                <center><a id="signinlink" href="/" class="custombutton btncustom" style="position:absolute;display:inline-block;top:0;bottom:0;left:0;right:0;margin:auto;width:100px;height:40px;">Home</a></center>
            

            
            <?php endif; ?>

    </div>
                    


</div>
<nav class="footer" style="position:fixed;bottom:0px;top:auto;">
        Copyright © 2017 | vithealth.com Pvt. Ltd. | All Rights Reserved | Privacy Policy & Website Terms of Use
    </nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>