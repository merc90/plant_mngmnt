<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_production/editProduction/'.$editProductionID, $attributes);
?>

	<div class="form-group">

	<div class="form-group">
		 <label for="dateTo">Date To</label>
				<?php
					$data = array(
		              'name'        => 'dateTo',
		              'id'        => 'dateTo',
		              'value'       => ($_POST)? set_value('dateTo'):$editProductionDetails[0]['dateTo'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'type' => 'date',
					  'placeholder' => 'Enter The Date To',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('dateTo'); ?></span>
	</div>
		<label for="producedAmount">Produced Amount</label>
		 	<?php
					$data = array(
		              'name'        => 'producedAmount',
		              'id'        => 'producedAmount',
		              'value'       => ($_POST)? set_value('v'):$editProductionDetails[0]['producedAmount'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Amount Produced',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('producedAmount'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
