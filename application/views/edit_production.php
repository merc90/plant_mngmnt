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
					  'placeholder' => 'Enter The Date Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('dateTo'); ?></span>
	</div>
		<label for="producedAmount">Total Produced</label>
		 	<?php
					$data = array(
		              'name'        => 'producedAmount',
		              'id'        => 'producedAmount',
		              'value'       => ($_POST)? set_value('producedAmount'):$editProductionDetails[0]['producedAmount'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'placeholder' => 'Enter The Total Produced',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('producedAmount'); ?></span>
	</div>

	<?php $i=1; foreach($editProductionProducts as $product) { ?>
	<div class="form-group">
		 <label for="productName<?php echo $i;?>">Product Name</label>
				<?php
					$data = array(
		              'name'        => "productName".$i,
		              'id'        => "productName".$i,
		              'value'       => ($_POST)? set_value('productName'):$product['productName'],
		              'maxlength'   => '200',
		              'readonly' => 'true',
		              'class'   => 'form-control',
		              'placeholder' => 'Enter The Product Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('productName<?php echo $i;?>'); ?></span>
	</div>
	<div class="form-group" hidden>
		 <label for="productID<?php echo $i;?>">productID Name</label>
				<?php
					$data = array(
		              'name'        => "productID".$i,
		              'id'        => "productID".$i,
		              'value'       => ($_POST)? set_value('productID'):$product['productID'],
		              'maxlength'   => '200',
		              'readonly' => 'true',
		              'class'   => 'form-control',
		              'placeholder' => 'Enter The productID Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('productID<?php echo $i;?>'); ?></span>
	</div>
	<div class="form-group" id="<?php echo $i; ?>">
		 <label for="quantityProduced<?php echo $i;?>">Quantity Produced</label>
				<?php
					$data = array(
		              'name'        => "quantityProduced".$i,
		              'id'        => "quantityProduced".$i,
		              'value'       => ($_POST)? set_value('quantityProduced'):$product['quantityProduced'],
		              'maxlength'   => '200',
		              'class'   => 'form-control dispatch',
					  'placeholder' => 'Enter The Produced Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('quantityProduced<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="m2productID<?php echo $i;?>">ManufactureToProduct ID</label>
				<?php
					$data = array(
		              'name'        => "m2productID".$i,
		              'id'        => "m2productID".$i,
		              'value'       => ($_POST)? set_value('m2productID'):$product['m2productID'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The m2productID',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('m2productID<?php echo $i;?>'); ?></span>
	</div>

	<?php $i++; } ?>

	<div class="form-group" hidden>
		 <label for="totalProducts">totalProducts</label>
				<?php
					$data = array(
		              'name'        => "totalProducts",
		              'id'        => "totalProducts",
		              'value'       => ($_POST)? set_value('totalProducts'):$i-1,
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Percentage Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalProducts'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
