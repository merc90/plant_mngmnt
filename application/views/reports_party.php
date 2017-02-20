<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Satyam Admin</title>
        <!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>datatable/media/css/jquery.dataTables.css" />

		<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>datatable/media/js/jquery.dataTables.js"></script>


		<script>
		$(document).ready( function () {
			var di=0;
			 $('#order_list_table').DataTable();
			});
		</script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    [{type: 'string', label: 'Order ID'}, 'Order Quantity', 'Dispatched Quantity','Remaining Quantity'/*,'Total Price','Adavance Amount','Credit Amount'*/],
<?php
foreach ($chart_data as $data) {
    echo '["' .$data->orderID. '",'.$data->produced . ',' . $data->dispatchedQuantity . ',' . ($data->remainingQuantity-$data->dispatchedQuantity) . /* ',' . $data->totalPrice .  ',' . $data->advanceAmount .  ',' . $data->creditAmount .  */'],';
}
?>
                ]);
 
                var options = {
                    chart: {
                        title: 'Production Target Report',
                        subtitle: 'Target, Produced, and Deviation: <?php /*echo $min_year.'-'.$max_year;*/?>',
                    }
                };
 
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
 
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>    
    	<div id="page-wrapper">
			<div id="myTabContent" class="tab-content">    
				<div id="columnchart_table" style="width: 900px; ">
					<h1>Report of "<?php echo $chart_data[0]->partyName; ?>"</h1>
					<hr>
					<table id="order_list_table" class="display table table-striped table-hover">
						 <thead>
							  <tr>
									<th>Order ID</th>
				 					<th>Date Of Order</th>
									<th>Status</th>
									<th>Ordered Quantity</th>
									<th>Delivered Quantity</th>
									<th>Remaining Quantity</th>
									<th>Total Amount</th>
									<th>Amount Paid</th>
									<th>Amount Remaining</th>
							  </tr>
						 </thead>
						 <tbody>
						 	<?php foreach($chart_data as $chart) { ?>
							  	<tr>
									<td><?php echo $chart->orderID; ?></td>
									<td><?php echo $chart->dateOfOrder; ?></td>
									<td><?php echo $chart->status; ?></td>
									<td><?php echo $chart->produced; ?></td>
									<td><?php echo $chart->dispatchedQuantity; ?></td>
									<td><?php echo $chart->produced-$chart->dispatchedQuantity;; ?></td>
									<td><?php echo $chart->totalPrice; ?></td>
									<td><?php echo $chart->advanceAmount; ?></td>
									<td><?php echo $chart->creditAmount; ?></td>
								</tr>
							<?php } ?>
						 </tbody>
					</table>
				</div>
				<div style="width: 900px;"><hr></div>
        		<div id="columnchart_material" style="width: 900px; height: 500px;"></div>
        	</div>
        </div>
    </body>
</html>