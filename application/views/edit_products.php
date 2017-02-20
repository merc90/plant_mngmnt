<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_products/index/'.$editProductID, $attributes);
?>

	<div class="form-group">
		<label for="productName">Product Name</label>
		 	<?php
					$data = array(
		              'name'        => 'productName',
		              'id'        => 'productName',
		              'value'       => ($_POST)? set_value('productName'):$editProductDetails[0]['productName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
									'placeholder' => 'Enter The Product Name',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('productName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="percentageOfOrder">Percentage Of Order</label>
				<?php
					$data = array(
		              'name'        => 'percentageOfOrder',
		              'id'        => 'percentageOfOrder',
		              'value'       => ($_POST)? set_value('percentageOfOrder'):$editProductDetails[0]['percentageOfOrder'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Percentage Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('percentageOfOrder'); ?></span>
	</div>

	<div class="form-group">
		 <label for="basicRate">Basic Rate</label>
				<?php
					$data = array(
		              'name'        => 'basicRate',
		              'id'        => 'basicRate',
		              'value'       => ($_POST)? set_value('basicRate'):$editProductDetails[0]['basicRate'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Basic Rate',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('basicRate'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
