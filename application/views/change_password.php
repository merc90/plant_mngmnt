

<?php
// to display error message after validation
if (validation_errors()):
		
echo"<script type='text/javascript'>";
echo"$(document).ready(function() {";
echo"$('#success_msg').css('visibility', 'visible');";	
echo"$('#success_msg').show();";
echo"$('#success_msg').delay(8000).fadeOut();";	
echo"});";
echo"</script>";

endif;

?>

		
		
		
<?php
// to display successfull message after register
if ($this->session->flashdata('result') != ''):
		
echo"<script type='text/javascript'>";
echo"$(document).ready(function() {";
echo"$('#success_msg').css('visibility', 'visible');";	
echo"$('#success_msg').show();";
echo"$('#success_msg').delay(8000).fadeOut();";	
echo"setTimeout(function(){reload();},6000); });";
echo"</script>";

endif;

?>
<div id="page-wrapper">
<div class="container-fluid">
			<p>&nbsp;</p>
			<div id="success_msg">
				<?php

					if ($this->session->flashdata('result') != ''):
						 echo $this->session->flashdata('result'); 
					    
					endif;
				?>
				
				<?php
				 if(validation_errors()){
						echo "<div class='alert alert-danger'><span id='err'>Oops! some fields have an error. Please look at the messages in Red Font</span></div>";
				 } 
				?>
				

			</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="form-default">
	<h3>
		Change Password
	</h3>
<div class="well-sm">
</div>
			<?php
				$attributes = array('class' => 'form-horizontal','role' => 'form');
				echo form_open('/change_password/index/', $attributes);				
			?>
                
                <div class="form-group">
					 <label for="inputEmail3" class="col-sm-4 control-label">Current Password</label>
					<div class="col-sm-8">
						 <?php				
							$data = array(
							  'type'		=> 'text',
				              'name'        => 'cu_password',
				              'value'       => set_value('cu_password'),
							  'maxlength'   => '50',
							  'placeholder' => 'Enter Curent Password',
							  'class' => 'form-control'
				            );
							echo form_password($data);
						?>
						<span class=" error"><?php echo form_error('cu_password'); ?></span>
					</div>
				</div>

				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-4 control-label">New Password</label>
					<div class="col-sm-8">
						 <?php				
							$data = array(
							  'type'		=> 'text',
				              'name'        => 'password',
				              'value'       => set_value('password'),
							  'maxlength'   => '50',
							  'placeholder' => 'Enter New Password',
							  'class' => 'form-control'
				            );
							echo form_password($data);
						?>
						<span class=" error"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-4 control-label">Re enter New Password</label>
					<div class="col-sm-8">
						 <?php				
							$data = array(
							  'type'		=> 'text',
				              'name'        => 're_password',
				              'value'       => set_value('re_password'),
							  'maxlength'   => '50',
							  'placeholder' => 'Enter New Password',
							  'class' => 'form-control'
				            );
							echo form_password($data);
						?>
						<span class=" error"><?php echo form_error('re_password'); ?></span>
					</div>
				</div>
				<div class="form-group">
				<label for="inputPassword3" class="col-sm-6 control-label"></label>
					<div class="col-sm-6">
						 <button  type="submit" class="btn btn-maroon pull-right">Change Password</button>
					</div>
				</div>
				<?php
					echo form_close();
				?>
			
</div>
</div>
</div>
</div>
</div>
