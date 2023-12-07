
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
<script>
    var tableData = {!! json_encode(array_values($tableData)) !!};
    console.log(tableData)
    $("#datatable").DataTable({
        data: tableData,
        columns: [
            { data: 'id' },
            { data: 'sale_date' },
            { data: 'code' },
            { data: 'customer_name' },
            { data: 'total_price', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp' )}
        ]
    });
    var rawData = [{!! json_encode($salesYearly) !!}, {!! json_encode($salesMonthly) !!}];
    // rawData
    var render_type = 0;
    var data_type = 0;
    var dataSales = [];
    var chart_labels = [];

    console.log(rawData);

    chart_labels.push(Object.keys(rawData[0]))
    chart_labels.push(Object.keys(rawData[1]).map( k => k.substring(0, 4) + "-" + k.substring(4, 6) ))

    for (let i = 0; i < rawData.length ; i++){
        dataSaleTransaksi = Object.values(rawData[i]).map( d => d.sales_total)
        dataSaleNilaiTransaksi = Object.values(rawData[i]).map( d => d.sales_count)
        dataSaleTotalItem = Object.values(rawData[i]).map( d => d.total_items)
        
        dataSales.push([dataSaleTransaksi, dataSaleNilaiTransaksi, dataSaleTotalItem])
    }
    console.log(chart_labels)
    console.log(dataSales);
    gradientChartOptionsConfigurationWithTooltipPurple = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },

        tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
        },
        responsive: true,
        scales: {
                x: {
                    display: true,
                },
                y: {
                    display: true,
                    type: 'logarithmic',
                }
                }
    };
    console.log(chart_labels)


    var ctx = document.getElementById("chartBig1").getContext('2d');

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
    gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
    var config = {
    type: 'line',
    data: {
        labels: chart_labels[0],
        datasets: [{
        label: "Data Sales",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#d346b1',
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#d346b1',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#d346b1',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: dataSales[0][1],
        }]
    },
    options: gradientChartOptionsConfigurationWithTooltipPurple
    };
    var myChartData = new Chart(ctx, config);
    $("#0").click(function() {
        render_type = 0
        rerenderChart()
    
    });
    $("#1").click(function() {
        render_type = 1
        rerenderChart()

    });

    $("#2").click(function() {
        data_type = 0
        rerenderChart()

    });
    $("#3").click(function() {
        data_type = 1
        rerenderChart()

    });
    $("#4").click(function() {
        data_type = 2
        rerenderChart()

    });

    function rerenderChart(){
        var data = myChartData.config.data;
        data.datasets[0].data = dataSales[render_type][data_type];
        data.labels = chart_labels[render_type];
        myChartData.update();
    }
</script>