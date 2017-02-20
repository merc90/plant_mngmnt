<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_admin/editLimit/'.$editLimitID, $attributes);
?>

	<div class="form-group">

	<div class="form-group">
		 <label for="adminName">Salesman Name</label>
				<?php
					$data = array(
		              'name'        => 'adminName',
		              'id'        => 'adminName',
		              'value'       => ($_POST)? set_value('adminName'):$editDetails[0]['adminName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Admin Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('adminName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="orderStockLimit">Order Stock Limit</label>
				<?php
					$data = array(
		              'name'        => 'orderStockLimit',
		              'id'        => 'orderStockLimit',
		              'value'       => ($_POST)? set_value('orderStockLimit'):$editDetails[0]['orderStockLimit'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The orderStockLimit',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('orderStockLimit'); ?></span>
	</div>


	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
