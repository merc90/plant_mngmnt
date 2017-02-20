<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_order/editDispatch/'.$editOrderID, $attributes);
?>

<script>
$(document).ready( function () {
	var orderID=0;
	calRemaining();
	calTotal();

	$('.dispatch').change(function(){
		var id=$(this).parent().attr("id");
		var initialQuantity="initialQuantity"+id;
		var remainingQuantity="remainingQuantity"+id;
		var remainingQuantityHidden="remainingQuantityHidden"+id;
		var dispatchedQuantity="dispatchedQuantity"+id;
		$('#'+remainingQuantity).val($('#'+initialQuantity).val()-$('#'+dispatchedQuantity).val());
		$('#'+remainingQuantityHidden).val($('#'+initialQuantity).val()-$('#'+dispatchedQuantity).val());
		calRemaining();
		// orderID=$(this).children(":selected").attr("id");
		// $("#xFactoryPrice").prop( "disabled", false );

		// $("#FOD").prop( "disabled", false );
		// cal();
	});
	// $('#totalPrice').bind("change", function(){
	// 	$("#advanceAmount").prop( "disabled", false );
	// });
	// $('#FOD').change(function(){
	// 	cal();
	// });
	// $('#advanceAmount').change(function(){
	// 	$('#creditAmount').val(parseInt($('#totalPrice').val())-parseInt($('#advanceAmount').val()));
	// 	$('#creditAmountHidden').val(parseInt($('#totalPrice').val())-parseInt($('#advanceAmount').val()));
	// });
	// $('#order_list_table').DataTable();
	function calRemaining()
	{
		var productNumber=<?php echo count($editDispatchDetails); ?>;
		var remaining= 0.0;
		for(var q=1;q<=productNumber;q++)
		{
			var remainingQuantity="remainingQuantity"+q;	
			remaining+=parseFloat($('#'+remainingQuantity).val());
		}
		$('#totalRemainingQuantity').val(remaining);
	}
	function calTotal()
	{
		var productNumber=<?php echo count($editDispatchDetails); ?>;
		var remaining= 0.0;
		for(var q=1;q<=productNumber;q++)
		{
			var remainingQuantity="initialQuantity"+q;	
			remaining+=parseFloat($('#'+remainingQuantity).val());
		}
		$('#totalOrderedQuantity').val(remaining);
	}

} );

</script>
	<div class="form-group">

	<div class="form-group" >
		 <label for="totalOrderedQuantity">Total Ordered Quantity</label>
				<?php
					$data = array(
		              'name'        => "totalOrderedQuantity",
		              'id'        => "totalOrderedQuantity",
		              'value'       => ($_POST)? set_value('totalOrderedQuantity'):0,
		              'maxlength'   => '200',
		              'readonly' => 'true',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Total Ordered Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalOrderedQuantity'); ?></span>
	</div>

	<?php $i=1; foreach($editDispatchDetails as $editDispatchDetail) { ?>
	<div class="form-group">
		 <label for="productName<?php echo $i;?>">Product Name</label>
				<?php
					$data = array(
		              'name'        => "productName".$i,
		              'id'        => "productName".$i,
		              'value'       => ($_POST)? set_value('productName'):$editDispatchDetail['productName'],
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
		 <label for="productID<?php echo $i;?>">Product ID</label>
				<?php
					$data = array(
		              'name'        => "productID".$i,
		              'id'        => "productID".$i,
		              'value'       => ($_POST)? set_value('productID'):$editDispatchDetail['productID'],
		              'maxlength'   => '200',
		              'readonly' => 'true',
		              'class'   => 'form-control',
		              'placeholder' => 'Enter The Product Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('productID<?php echo $i;?>'); ?></span>
	</div>
	<div class="form-group" id="<?php echo $i; ?>">
		 <label for="dispatchedQuantity<?php echo $i;?>">Dispatched Quantity</label>
				<?php
					$data = array(
		              'name'        => "dispatchedQuantity".$i,
		              'id'        => "dispatchedQuantity".$i,
		              'value'       => ($_POST)? set_value('dispatchedQuantity'):$editDispatchDetail['dispatchedQuantity'],
		              'maxlength'   => '200',
		              'class'   => 'form-control dispatch',
					  'placeholder' => 'Enter The Dispatched Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('dispatchedQuantity<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group">
		 <label for="remainingQuantity<?php echo $i;?>">Remaining Quantity</label>
				<?php
					$data = array(
		              'name'        => "remainingQuantity".$i,
		              'id'        => "remainingQuantity".$i,
		              'value'       => ($_POST)? set_value('remainingQuantity'):$editDispatchDetail['remainingQuantity']-$editDispatchDetail['dispatchedQuantity'],
		              'maxlength'   => '200',
		              'readOnly' => 'true',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Remaining Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('remainingQuantity<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="remainingQuantityHidden<?php echo $i;?>">Remaining Quantity</label>
				<?php
					$data = array(
		              'name'        => "remainingQuantityHidden".$i,
		              'id'        => "remainingQuantityHidden".$i,
		              'value'       => ($_POST)? set_value('remainingQuantityHidden'):$editDispatchDetail['remainingQuantity'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Remaining Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('remainingQuantityHidden<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="initialQuantity<?php echo $i;?>">Initial Quantity</label>
				<?php
					$data = array(
		              'name'        => "initialQuantity".$i,
		              'id'        => "initialQuantity".$i,
		              'value'       => ($_POST)? set_value('initialQuantity'):$editDispatchDetail['remainingQuantity'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Remaining Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('initialQuantity<?php echo $i;?>'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="dispatchedID<?php echo $i;?>">Dispatched ID</label>
				<?php
					$data = array(
		              'name'        => "dispatchedID".$i,
		              'id'        => "dispatchedID".$i,
		              'value'       => ($_POST)? set_value('dispatchedID'):$editDispatchDetail['dispatchedID'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The dispatchedID',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('dispatchedID<?php echo $i;?>'); ?></span>
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

	<div class="form-group" >
		 <label for="totalRemainingQuantity">Total Remaining Quantity</label>
				<?php
					$data = array(
		              'name'        => "totalRemainingQuantity",
		              'id'        => "totalRemainingQuantity",
		              'value'       => ($_POST)? set_value('totalRemainingQuantity'):0,
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly' => 'true',
					  'placeholder' => 'Enter The Total Remaining Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalRemainingQuantity'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
