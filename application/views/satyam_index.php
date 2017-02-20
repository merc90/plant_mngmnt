<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<div class="col-xs-12">

<div class="form-default">
	<h3>
		Login
	</h3>
<div class="well-sm">
</div>
		<span class=" error"><?php if(!empty($message)) echo $message ?></span>

			<?php
				$attributes = array('class' => 'form-horizontal','role' => 'form');
				echo form_open('/satyam_index/validateLogin', $attributes);
			?>

				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-4 control-label">User ID</label>
					<div class="col-sm-6">
					 <?php
							$data = array(
				              'name'        => 'userID',
				              'value'       => set_value('email'),
				              'maxlength'   => '100',
							  'placeholder' => 'Enter User ID',
							  'class' => 'form-control'
				            );
							echo form_input($data);
						?>
						<span class=" error"><?php echo form_error('userID'); ?></span>
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
					<div class="col-sm-6">
					 <?php
							$data = array(
				              'name'        => 'password',
				              'value'       => set_value('password'),
				              'maxlength'   => '100',
							  'placeholder' => 'Enter password',
							  'class' => 'form-control'
				            );
							echo form_password($data);
						?>
						<span class=" error"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-8">
						 <a href="#modal-forgot-password" class="btn text-black" data-toggle="modal" id="forgetpasswordlink"><em>Forgot Password?</em></a>
						 <button  type="submit" class="btn btn-maroon pull-right">Sign in</button>
					</div>
				</div>
				<?php
					echo form_close();
				?>
</div>
</div>


<div class="modal fade" id="modal-forgot-password" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
   	<div class="modal-dialog">
      	<div class="modal-content">
          <div class="modal-header">
          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2>Forgot Password?</h2>
          </div>
          <div class="modal-body">
          	<div class="container-fluid clearfix">
	          	<div class="form-group">
					 <label for="adminEmail">Email address</label>
					 <input class="form-control" placeholder="Email address" id="forgotPasswordEmail" type="email" name="adminEmail" required="required" />
					 <span class="error alert-error" id="email_error"></span>
					 <span class="" id="fp_pwd_success"></span>
				</div>
			</div>
			<div class="container-fluid clearfix">
					<button type="submit" id="forgetPasswordBtn" class="btn btn-maroon pull-right">Submit</button>
			</div>
          </div>
          <!-- <div class="modal-footer">
               
          </div> -->
      	</div>
   	</div>
</div>


<script type="text/javascript">

</script>
</div>
	</div>
</div>
<footer>
<div class="footer" style="position:fixed;">
	<div class="text-center">&copy; 2016 Satyam</div>
</div>
</footer>



	<script type="text/javascript" src="<?php echo base_url();?>js/qgAdmin.js"></script>

</body>
</html>
