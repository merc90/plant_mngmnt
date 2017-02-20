<?php
$this->load->view('imports_css_js');

	$attributes = array('class' => '','role' => 'form');
	echo form_open('/edit_order/editOrder/'.$editOrderID, $attributes);
?>

	<div class="form-group">

	<div class="form-group">
		 <label for="dateOfOrder">Date Of Order</label>
				<?php
					$data = array(
		              'name'        => 'dateOfOrder',
		              'id'        => 'dateOfOrder',
		              'value'       => ($_POST)? set_value('dateOfOrder'):$editOrderDetails[0]['dateOfOrder'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Date Of Order',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('dateOfOrder'); ?></span>
	</div>
		<label for="partyID">Party Name</label>
		 	<?php
					$data = array(
		              'name'        => 'partyID',
		              'id'        => 'partyID',
		              'value'       => ($_POST)? set_value('partyID'):$editOrderDetails[0]['partyName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Party Name',

		            );
					echo form_input($data);
			?>
			<span class="error" id="error_name"><?php echo form_error('plantName'); ?></span>
	</div>
	<div class="form-group">
		 <label for="destination">Destination</label>
				<?php
					$data = array(
		              'name'        => 'destination',
		              'id'        => 'destination',
		              'value'       => ($_POST)? set_value('destination'):$editOrderDetails[0]['destination'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Destination',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('destination'); ?></span>
	</div>

	<div class="form-group">
		 <label for="fullDeliveryAddress">Full Delivery Address</label>
				<?php
					$data = array(
		              'name'        => 'fullDeliveryAddress',
		              'id'        => 'fullDeliveryAddress',
		              'value'       => ($_POST)? set_value('fullDeliveryAddress'):$editOrderDetails[0]['fullDeliveryAddress'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Full Delivery Address',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('fullDeliveryAddress'); ?></span>
	</div>

	<div class="form-group">
		 <label for="adminID">Passed By</label>
				<?php
					$data = array(
		              'name'        => 'adminID',
		              'id'        => 'adminID',
		              'value'       => ($_POST)? set_value('adminID'):$adminName[0]['adminName'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
		              'readonly'=>'true',
					  'placeholder' => 'Enter The Admin Name',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('adminID'); ?></span>
	</div>

	<div class="form-group">
		 <label for="orderStatus">Order Status</label><br/>
		 <?php
					 $dd_list = array();
					 	  $dd_list[''] = "Select";
						  foreach($orderStatusList as $status)
						  {
						  	$dd_list[$status['statusID']] = $status['statusFullName'];
						  }
						 $dd_name = "orderStatus";
						 $sl_val = $this->input->post($dd_name);
						echo form_dropdown($dd_name, $dd_list,set_value($dd_name,( ( !empty($sl_val) ) ? "$sl_val" : $editOrderDetails[0]['statusID'])) ," class='selectpicker' id='orderStatus'");
				?>
	</div>

	<div class="form-group">
		 <label for="totalQuantity">Total Quantity</label>
				<?php
					$data = array(
		              'name'        => 'totalQuantity',
		              'id'        => 'totalQuantity',
		              'value'       => ($_POST)? set_value('totalQuantity'):$editOrderDetails[0]['totalQuantity'],
		              'maxlength'   => '200',
		              'class'   => 'form-control',
					  'placeholder' => 'Enter The Total Quantity',

		            );
					echo form_input($data);
				?>
			<span class="error" id="error_name"><?php echo form_error('totalQuantity'); ?></span>
	</div>

	<button type="submit" class="btn btn-maroon pull-right">Submit</button>

<?php
	echo form_close();
?>
