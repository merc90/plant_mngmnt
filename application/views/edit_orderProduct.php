<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_order/editProduct/'.$editOrderID, $attributes);
?>

	<div class="form-group">
	<?php $i=1; foreach($editProductDetails as $editProductDetail) { ?>
	<div class="form-group">
		 <label for="productName<?php echo $i;?>">Product Name</label>
				<?php
					$data = array(
		              'name'        => "productName".$i,
		              'id'        => "productName".$i,
		              'value'       => ($_POST)? set_value('productName'):$editProductDetail['productName'],
		              'maxlength'   => '200',
		              'readonly' => 'true',
		              'class'   => 'form-control',
		              'placeholder' => 'Enter The Product Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('productName<?php echo $i;?>'); ?></span>
	</div>
	<div class="form-group">
		 <label for="percentageOfOrder<?php echo $i;?>">Percentage Of Order</label>
				<?php
					$data = array(
		              'name'        => "percentageOfOrder".$i,
		              'id'        => "percentageOfOrder".$i,
		              'value'       => ($_POST)? set_value('percentageOfOrder'):$editProductDetail['percantageOfOrder'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Percentage Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('percentageOfOrder<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="orderToProID<?php echo $i;?>">orderToProID</label>
				<?php
					$data = array(
		              'name'        => "orderToProID".$i,
		              'id'        => "orderToProID".$i,
		              'value'       => ($_POST)? set_value('orderToProID'):$editProductDetail['orderToProID'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Percentage Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('orderToProID<?php echo $i;?>'); ?></span>
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
