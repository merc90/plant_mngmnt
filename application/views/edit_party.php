<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_party/index/'.$editPartyID, $attributes);
?>

	<div class="form-group">
		<label for="partyName">Party Name</label>
		 	<?php
					$data = array(
		              'name'        => 'partyName',
		              'id'        => 'partyName',
		              'value'       => ($_POST)? set_value('partyName'):$editPartyDetails[0]['partyName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
									'placeholder' => 'Enter The Party Name',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('partyName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="address">Address</label>
				<?php
					$data = array(
		              'name'        => 'address',
		              'id'        => 'address',
		              'value'       => ($_POST)? set_value('address'):$editPartyDetails[0]['address'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Address',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('address'); ?></span>
	</div>

	<div class="form-group">
		 <label for="tinVat">Tin Vat</label>
				<?php
					$data = array(
		              'name'        => 'tinVat',
		              'id'        => 'tinVat',
		              'value'       => ($_POST)? set_value('tinVat'):$editPartyDetails[0]['tinVat'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Tin Vat',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('tinVat'); ?></span>
	</div>

	<div class="form-group">
		 <label for="emailID">Email ID</label>
				<?php
					$data = array(
		              'name'        => 'emailID',
		              'id'        => 'emailID',
		              'value'       => ($_POST)? set_value('emailID'):$editPartyDetails[0]['emailID'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Email ID',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('emailID'); ?></span>
	</div>

	<div class="form-group">
		 <label for="phoneNo">Phone No</label>
				<?php
					$data = array(
		              'name'        => 'phoneNo',
		              'id'        => 'phoneNo',
		              'value'       => ($_POST)? set_value('phoneNo'):$editPartyDetails[0]['phoneNo'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Phone No',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('phoneNo'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
