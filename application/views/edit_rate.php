<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_order/editRate/'.$editOrderID, $attributes);
?>

	<div class="form-group">
	<?php $i=1; foreach($editRateDetails as $editRateDetail) { ?>
	<div class="form-group">
		 <label for="productName<?php echo $i;?>">Product Name</label>
				<?php
					$data = array(
		              'name'        => "productName".$i,
		              'id'        => "productName".$i,
		              'value'       => ($_POST)? set_value('productName'):$editRateDetail['productName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly' => 'true',
		              'placeholder' => 'Enter The Product Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('productName<?php echo $i;?>'); ?></span>
	</div>
	<div class="form-group">
		 <label for="basicRate<?php echo $i;?>">Basic Rate</label>
				<?php
					$data = array(
		              'name'        => "basicRate".$i,
		              'id'        => "basicRate".$i,
		              'value'       => ($_POST)? set_value('basicRate'):$editRateDetail['basicRate'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly' => 'true',
					  'placeholder' => 'Enter The Basic Rate',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('basicRate<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group">
		 <label for="sizeDiffRate<?php echo $i;?>">Size Difference Rate</label>
				<?php
					$data = array(
		              'name'        => "sizeDiffRate".$i,
		              'id'        => "sizeDiffRate".$i,
		              'value'       => ($_POST)? set_value('sizeDiffRate'):$editRateDetail['sizeDiffRate'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Size Difference Rate',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('sizeDiffRate<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="sizeDiffID<?php echo $i;?>">Sizze Difference ID</label>
				<?php
					$data = array(
		              'name'        => "sizeDiffID".$i,
		              'id'        => "sizeDiffID".$i,
		              'value'       => ($_POST)? set_value('sizeDiffID'):$editRateDetail['sizeDiffID'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Percentage Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('sizeDiffID<?php echo $i;?>'); ?></span>
	</div>

	<?php $i++; } ?>

	<div class="form-group" hidden="">
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
