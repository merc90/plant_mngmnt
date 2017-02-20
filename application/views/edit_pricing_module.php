<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_pricing/editPricing/'.$editOrderID, $attributes);
?>
<script>
$(document).ready( function () {
	var orderID=0;
	$('#feesOfDelivery').change(function(){
		cal();
	});
	cal();
	$('#advanceAmount').change(function(){
		cal();
	});
	function cal()
	{
		var quantity=<?php echo $quantity; ?>;
		var res=parseFloat(parseFloat($('#feesOfDelivery').val())*parseFloat(quantity))+parseFloat($('#exFactoryPrice').val());
		$('#totalPrice').val(res);
		$('#totalPriceHidden').val(res);
		$('#creditAmount').val(parseFloat($('#totalPrice').val())-parseFloat($('#advanceAmount').val()));
		$('#creditAmountHidden').val(parseFloat($('#totalPrice').val())-parseFloat($('#advanceAmount').val()));
	}

} );

</script>

	<div class="form-group">

	<div class="form-group">
		 <label for="feesOfDelivery">Fees Of Delivery</label>
				<?php
					$data = array(
		              'name'        => 'feesOfDelivery',
		              'id'        => 'feesOfDelivery',
		              'value'       => ($_POST)? set_value('feesOfDelivery'):$editPricingDetails[0]['feesOfDelivery'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Fees Of Delivery',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('feesOfDelivery'); ?></span>
	</div>
		<label for="exFactoryPrice">Ex Factory Price</label>
		 	<?php
					$data = array(
		              'name'        => 'exFactoryPrice',
		              'id'        => 'exFactoryPrice',
		              'value'       => ($_POST)? set_value('exFactoryPrice'):$exFactoryPrice,
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Ex Factory Price',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('exFactoryPrice'); ?></span>
	</div>
	<div class="form-group">
		 <label for="totalPrice">Total Price</label>
				<?php
					$data = array(
		              'name'        => 'totalPrice',
		              'id'        => 'totalPrice',
		              'value'       => ($_POST)? set_value('totalPrice'):$editPricingDetails[0]['totalPrice'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly' => 'true',
					  'placeholder' => 'Enter The Total Price',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalPrice'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="totalPriceHidden">Total PriceHidden</label>
				<?php
					$data = array(
		              'name'        => 'totalPriceHidden',
		              'id'        => 'totalPriceHidden',
		              'value'       => ($_POST)? set_value('totalPriceHidden'):$editPricingDetails[0]['totalPrice'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Total PriceHidden',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalPriceHidden'); ?></span>
	</div>

	<div class="form-group">
		 <label for="advanceAmount">Advance Amount</label>
				<?php
					$data = array(
		              'name'        => 'advanceAmount',
		              'id'        => 'advanceAmount',
		              'value'       => ($_POST)? set_value('advanceAmount'):$editPricingDetails[0]['advanceAmount'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Advance Amount',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('advanceAmount'); ?></span>
	</div>

	<div class="form-group">
		 <label for="creditAmount">Credit Amount</label>
				<?php
					$data = array(
		              'name'        => 'creditAmount',
		              'id'        => 'creditAmount',
		              'value'       => ($_POST)? set_value('creditAmount'):$editPricingDetails[0]['creditAmount'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Credit Amount',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('creditAmount'); ?></span>
	</div>

	<div class="form-group" hidden>
		 <label for="creditAmountHidden">Credit Amount Hidden</label>
				<?php
					$data = array(
		              'name'        => 'creditAmountHidden',
		              'id'        => 'creditAmountHidden',
		              'value'       => ($_POST)? set_value('creditAmount'):$editPricingDetails[0]['creditAmount'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Credit Amount Hidden',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('creditAmountHidden'); ?></span>
	</div>

	<div class="form-group">
		 <label for="daysOfCredit">Date Of Credit</label>
				<?php
					$data = array(
		              'name'        => 'daysOfCredit',
		              'id'        => 'daysOfCredit',
		              'value'       => ($_POST)? set_value('daysOfCredit'):$editPricingDetails[0]['daysOfCredit'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'type'    =>  'date',
					  'placeholder' => 'Enter The Days Of Credit',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('daysOfCredit'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
