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
                    [{type: 'string', label: ''}, 'Order Taken', 'Order Dispatched','Deviation'],
<?php
foreach ($chart_data as $data) {
    echo '["' .$data->productName. '",'.$data->totalQuantity . ',' . $data->dispatchedQuantity . ',' . ($data->dispatchedQuantity-$data->totalQuantity) .  '],';
}
?>
                ]);
 
                var options = {
                    chart: {
                        title: 'Order Taken To Dispatch Report',
                        subtitle: 'Order Taken, Order Dispatched, and Deviation: <?php /*echo $min_year.'-'.$max_year;*/?>',
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

                <div id="columnchart_table" style="width: 900px; height: 350px;">
                    <h1>Order Taken To Dispatch Report</h1>
                    <hr>
                    <table id="order_list_table" class="display table table-striped table-hover">
                         <thead>
                              <tr>
                                    <th>Product Name</th>
                                    <th>Order Taken</th>
                                    <th>Order Dispatched</th>
                                    <th>Deviation</th>
                                    
                              </tr>
                         </thead>
                         <tbody>
                            <?php foreach($chart_data as $chart) { ?>
                                <tr>
                                    <td><?php echo $chart->productName; ?></td>
                                    <td><?php echo $chart->totalQuantity; ?></td>
                                    <td><?php echo $chart->dispatchedQuantity; ?></td>
                                    <td><?php echo ($chart->dispatchedQuantity-$chart->totalQuantity); ?></td>
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