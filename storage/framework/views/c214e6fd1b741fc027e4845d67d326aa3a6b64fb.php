
            <form action="/signup" method="POST" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="legend">Sign Up <i class="fa fa-sign-in"></i></div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="fname" placeholder="First name" required>
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="lname" placeholder="Last name" required>
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="emailid" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="confpassword" placeholder="reenter password">
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="custombutton btncustom  " value="Sign Up">
                    </div>
                </div> 
            </form>
       
                    
        