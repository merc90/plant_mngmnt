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
                    [{type: 'string', label: 'Order ID'}, 'Ordered Quantity', 'Dispatched Quantity','Remaining Quantity'],
<?php
$q=0; foreach ($chart_data[0] as $data) {
    echo '["' .$data->partyName. '",'.$data->produced . ',' . $chart_data[1][$q]->dispatchedQuantity . ',' . ($chart_data[1][$q]->remainingQuantity-$chart_data[1][$q]->dispatchedQuantity) . '],';
$q++;}

?>
                ]);
 
                var options = {
                    chart: {
                        title: 'Partywise Selling Report',
                        subtitle: 'Ordered, Dispatched, and Remaining: <?php /*echo $min_year.'-'.$max_year;*/?>',
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
                    <h1>Party wise selling report</h1>
                    <hr>
                    <table id="order_list_table" class="display table table-striped table-hover">
                         <thead>
                              <tr>
                                    <th>Party Name</th>
                                    <th>Ordered Quantity</th>
                                    <th>Delivered Quantity</th>
                                    <th>Remaining Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Remaining</th>
                              </tr>
                         </thead>
                         <tbody>
                            <?php $q=0; foreach($chart_data[0] as $chart) { ?>
                                <tr>
                                    <td><?php echo $chart->partyName; ?></td>
                                    <td><?php echo $chart->produced; ?></td>
                                    <td><?php echo $chart_data[1][$q]->dispatchedQuantity; ?></td>
                                    <td><?php echo $chart->produced-$chart_data[1][$q]->dispatchedQuantity; ?></td>
                                    <td><?php echo $chart_data[1][$q]->totalPrice; ?></td>
                                    <td><?php echo $chart_data[1][$q]->advanceAmount; ?></td>
                                    <td><?php echo $chart_data[1][$q]->creditAmount; $q++;?></td>
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