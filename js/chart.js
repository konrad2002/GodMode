/*
The purpose of this demo is to demonstrate how multiple charts on the same page
can be linked through DOM and Highcharts events and API methods. It takes a
standard Highcharts config with a small variation for each data set, and a
mouse/touch event handler to bind the charts together.
*/


/**
 * In order to synchronize tooltips and crosshairs, override the
 * built-in events with handlers defined on the parent element.
 */
['mousemove', 'touchmove', 'touchstart'].forEach(function(eventType) {
    document.getElementById('container').addEventListener(
        eventType,
        function(e) {
            var chart,
                point,
                i,
                event;

            for (i = 0; i < Highcharts.charts.length; i = i + 1) {
                chart = Highcharts.charts[i];
                // Find coordinates within the chart
                event = chart.pointer.normalize(e);
                // Get the hovered point
                point = chart.series[0].searchPoint(event, true);

                if (point) {
                    point.highlight(e);
                }
            }
        }
    );
});

/**
 * Override the reset function, we don't need to hide the tooltips and
 * crosshairs.
 */
Highcharts.Pointer.prototype.reset = function() {
    return undefined;
};

/**
 * Highlight a point by showing tooltip, setting hover state and draw crosshair
 */
Highcharts.Point.prototype.highlight = function(event) {
    event = this.series.chart.pointer.normalize(event);
    this.onMouseOver(); // Show the hover marker
    this.series.chart.tooltip.refresh(this); // Show the tooltip
    this.series.chart.xAxis[0].drawCrosshair(event, this); // Show the crosshair
};

/**
 * Synchronize zooming through the setExtremes event handler.
 */
function syncExtremes(e) {
    var thisChart = this.chart;

    if (e.trigger !== 'syncExtremes') { // Prevent feedback loop
        Highcharts.each(Highcharts.charts, function(chart) {
            if (chart !== thisChart) {
                if (chart.xAxis[0].setExtremes) { // It is null while updating
                    chart.xAxis[0].setExtremes(
                        e.min,
                        e.max,
                        undefined,
                        false, { trigger: 'syncExtremes' }
                    );
                }
            }
        });
    }
}



function drawChart(main) {

    console.log("drawing chart");
    console.log(main.history);
    document.getElementById('container').innerHTML = "";

    main.history.forEach(data => {
        console.log(data);
    });

    var i = 0;
    main.history.forEach(dataset => {
        console.log("loading history " + i);


        // Add X values
        dataset = Highcharts.map(dataset, function(val, j) {
            return [j, val];
        });

        var chartDiv = document.createElement('div');
        chartDiv.className = 'chart';
        document.getElementById('container').appendChild(chartDiv);

        Highcharts.chart(chartDiv, {
            chart: {
                marginLeft: 40, // Keep all charts left aligned
                spacingTop: 20,
                spacingBottom: 20,
                animation: false
            },
            title: {
                text: main.populations[i].type,
                align: 'left',
                margin: 0,
                x: 30
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            xAxis: {
                crosshair: true,
                events: {
                    setExtremes: syncExtremes
                },
                labels: {
                    format: '{value}'
                }
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            tooltip: {
                positioner: function() {
                    return {
                        // right aligned
                        x: this.chart.chartWidth - this.label.width,
                        y: 10 // align to title
                    };
                },
                borderWidth: 0,
                backgroundColor: 'none',
                pointFormat: '{point.y}',
                headerFormat: '',
                shadow: false,
                style: {
                    fontSize: '18px'
                },
                valueDecimals: dataset
            },
            series: [{
                animation: false,
                data: dataset,
                name: main.populations[i].type,
                type: 'line',
                lineWidth: 4,
                color: Highcharts.getOptions().colors[i+2],
                fillOpacity: 0.3,
                tooltip: {
                    valueSuffix: ' Entities'
                }
            }]
        });
        i++;
    });
}