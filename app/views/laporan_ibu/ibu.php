<script type="text/javascript">
    $(function() {
// Set up the chart
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Monitoring Ibu'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: [{
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                }]
        });


// Activate the sliders
        $('#R0').on('change', function() {
            chart.options.chart.options3d.alpha = this.value;
            showValues();
            chart.redraw(false);
        });
        $('#R1').on('change', function() {
            chart.options.chart.options3d.beta = this.value;
            showValues();
            chart.redraw(false);
        });

        function showValues() {
            $('#R0-value').html(chart.options.chart.options3d.alpha);
            $('#R1-value').html(chart.options.chart.options3d.beta);
        }
        showValues();
    });
</script>

<div class="clearfix">
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Laporan Monitoring Ibu</a>
                    </div>
                    <div class="navbar-collapse collapse navbar-inverse-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>LaporanIbu"><i class="icon-plus-sign icon-white"> </i> Ibu</a></li>
                            <li><a class="btn-info" href="<?php echo App::instance()->base_url; ?>LaporanIbu"><i class="icon-plus-sign icon-white"> </i> Semua</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <form action="<?php echo App::instance()->base_url; ?>Ibu" method="get" class="navbar-form navbar-left">
                                <input type="text" required="" placeholder="Kata kunci pencarian ..." value="<?php echo App::instance()->input->get('q') ?>" style="width: 200px" name="q" class="form-control">
                                <button class="btn btn-danger" type="submit"><i class="icon-search icon-white"> </i> Cari</button>
                            </form>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </div><!-- /.navbar -->
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="container"></div> 
            </div>
        </div>
    </div>
</div>
<script src="<?php echo App::instance()->base_url ?>assets/js/highchart/highcharts.js"></script>
<script src="<?php echo App::instance()->base_url ?>assets/js/highchart/highcharts-3d.js"></script>
<script src="<?php echo App::instance()->base_url ?>assets/js/highchart/modules/exporting.js"></script>