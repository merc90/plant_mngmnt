<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_admin/editAdmin/'.$editAdminID, $attributes);
?>

	<div class="form-group">
		<label for="adminName">Name</label>
		 	<?php
					$data = array(
		              'name'        => 'adminName',
		              'id'        => 'adminName',
		              'value'       => ($_POST)? set_value('adminName'):$editAdminDetails['adminName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
									'placeholder' => 'Enter The Name',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('adminName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="adminEmail">Email address</label>
				<?php
					$data = array(
		              'name'        => 'adminEmail',
		              'id'        => 'adminEmail',
		              'value'       => ($_POST)? set_value('adminEmail'):$editAdminDetails['adminEmail'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('adminEmail'); ?></span>
	</div>

	<div class="form-group">
		 <label for="address">Address</label>
				<?php
					$data = array(
		              'name'        => 'address',
		              'id'        => 'address',
		              'value'       => ($_POST)? set_value('address'):$editAdminDetails['address'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Address',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('address'); ?></span>
	</div>

	<div class="form-group">
		 <label for="mobileNo">Phone number</label>
				<?php
					$data = array(
		              'name'        => 'mobileNo',
		              'id'        => 'mobileNo',
		              'value'       => ($_POST)? set_value('mobileNo'):$editAdminDetails['mobileNo'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Phone',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('mobileNo'); ?></span>
	</div>

	<div class="form-group">
		 <label for="adminRole">Role</label><br/>

		 <?php
					 $dd_list = array();

					 	  $dd_list[''] = "Select";
						  foreach($adminRolesList as $roles)
						  {
						  	$dd_list[$roles['roleID']] = $roles['role'];
						  }

						 $dd_name = "adminRole";

						 $sl_val = $this->input->post($dd_name);

						echo form_dropdown($dd_name, $dd_list,set_value($dd_name,( ( !empty($sl_val) ) ? "$sl_val" : $editAdminDetails['adminRole'])) ," class='selectpicker' id='adminRole'");

				?>


	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
