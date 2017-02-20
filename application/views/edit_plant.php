<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_plant/index/'.$editPlantID, $attributes);
?>

	<div class="form-group">
		<label for="plantName">Plant Name</label>
		 	<?php
					$data = array(
		              'name'        => 'plantName',
		              'id'        => 'plantName',
		              'value'       => ($_POST)? set_value('plantName'):$editPlantDetails[0]['plantName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
									'placeholder' => 'Enter The Plant Name',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('plantName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="plantAddress">Plant Address</label>
				<?php
					$data = array(
		              'name'        => 'plantAddress',
		              'id'        => 'plantAddress',
		              'value'       => ($_POST)? set_value('plantAddress'):$editPlantDetails[0]['plantAddress'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Plant Address',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('plantAddress'); ?></span>
	</div>

	<div class="form-group">
		 <label for="plantLocation">Plant Location</label>
				<?php
					$data = array(
		              'name'        => 'plantLocation',
		              'id'        => 'plantLocation',
		              'value'       => ($_POST)? set_value('plantLocation'):$editPlantDetails[0]['plantLocation'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Plant Location',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('plantLocation'); ?></span>
	</div>

	<div class="form-group">
		 <label for="plantDescription">Plant Description</label>
				<?php
					$data = array(
		              'name'        => 'plantDescription',
		              'id'        => 'plantDescription',
		              'value'       => ($_POST)? set_value('plantDescription'):$editPlantDetails[0]['plantDescription'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Plant Description',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('plantDescription'); ?></span>
	</div>

	<div class="form-group">
		 <label for="contactNo">Contact Number</label>
				<?php
					$data = array(
		              'name'        => 'contactNo',
		              'id'        => 'contactNo',
		              'value'       => ($_POST)? set_value('contactNo'):$editPlantDetails[0]['contactNo'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Contact Number',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('contactNo'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
