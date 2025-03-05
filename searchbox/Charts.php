<?php
session_start();
$var = $_GET['data'];
echo shell_exec("python Data_Downloader.py $var");
require_once('Nav-bar-search.php');
?> 

<html>
  <br>
<head>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.2/papaparse.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-stock.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-annotations.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  <link href="https://cdn.anychart.com/playground-css/annotated/annotated-title.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    /* Center the chart and add top padding */
    #container {
      width: 100%;
      height: 80%; /* Take 80% of the screen height */
      margin-top: 50px; /* Add padding from navbar */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Style for the 'Predict Buy & Sell' button */
    #uploadconfirm {
      position: fixed;
      bottom: 20px; /* 20px from the bottom */
      left: 50%;
      transform: translateX(-50%); /* Center horizontally */
      padding: 15px 40px; /* Larger padding for a bigger button */
      font-size: 18px; /* Standard font size */
      background-color: #4CAF50; /* Solid green background */
      color: white;
      border: none;
      border-radius: 50px; /* Rounded button */
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      transition: none; /* Remove animation */
    }

    /* Button style on hover */
    #uploadconfirm:hover {
      background-color: #45a049; /* Darker green on hover */
    }

    #uploadconfirm:focus {
      outline: none;
    }

    #uploadconfirm:active {
      background-color: #388e3c; /* Even darker green when clicked */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Deeper shadow on click */
    }

    /* Responsive design for mobile view */
    @media (max-width: 768px) {
      #uploadconfirm {
        font-size: 16px; /* Smaller font size */
        padding: 12px 30px; /* Reduced padding for smaller screens */
      }
    }

    @media (max-width: 480px) {
      #uploadconfirm {
        font-size: 14px; /* Even smaller font size for very small screens */
        padding: 10px 25px; /* Further reduced padding */
      }
    }
  </style>
</head>

<body>
  <div id="container"></div>

  <button id="uploadconfirm">Predict Buy & Sell</button>

  <script>
    var show = '<?=$var?>';
    var name = '<?=$var?>' + '.csv';

    anychart.onDocumentReady(function () {
      anychart.data.loadCsvFile(name, function (data) {
        var dataTable = anychart.data.table();
        dataTable.addData(data);
        var mapping = dataTable.mapAs({
          open: 1,
          high: 2,
          low: 3,
          close: 4
        });

        var scrollerMapping = dataTable.mapAs();
        scrollerMapping.addField('value', 5);

        var chart = anychart.stock();
        chart.padding([40, 40, 40, 40]);
        var plot = chart.plot(0);

        // Grid settings
        plot.yGrid(true).xGrid(true).xMinorGrid(true).yMinorGrid(true);

        // Create EMA indicators with period 50
        var ema = plot.ema(dataTable.mapAs({ value: 4 }));
        ema.series().stroke('1.5 #455a64');

        // Create candlestick series
        var series = plot.candlestick(mapping).name(show);
        series.legendItem().iconType('rising-falling');

        var controller = plot.annotations();

        chart.scroller().candlestick(mapping);

        // Set chart selected date/time range
        chart.selectRange('max', 'max');

        // Set container id for the chart
        chart.container('container');
        chart.draw();

        // Create range picker
        var rangePicker = anychart.ui.rangePicker();
        rangePicker.render(chart);

        // Create range selector
        var rangeSelector = anychart.ui.rangeSelector();
        rangeSelector.render(chart);

        // Signal data and handle button click
        const Signaldata = [];
        const uploadconfirm = document.getElementById('uploadconfirm').addEventListener('click', () => {
          Papa.parse(name, {
            download: true,
            header: true,
            skipEmptyLine: true,
            complete: function (results) {
              console.log(results);  // Log parsed data for debugging
              for (let i = 0; i < results.data.length; i++) {
                Signaldata.push(results.data[i].Signal);
                if (results.data[i].Signal == 1.0) {
                  // Marker for Buy (Up Arrow)
                  var marker1 = controller.marker({
                    xAnchor: new Date(results.data[i].Date), // Ensure it's a JavaScript Date
                    valueAnchor: results.data[i].Close,
                    size: 50,
                    offsetY: 20
                  });
                } else if (results.data[i].Signal == -1.0) {
                  // Marker for Sell (Down Arrow)
                  var marker2 = controller.marker({
                    xAnchor: new Date(results.data[i].Date), // Ensure it's a JavaScript Date
                    valueAnchor: results.data[i].Close,
                    markerType: "arrowDown",
                    size: 50,
                    offsetY: -50
                  });
                }
              }
            }
          });
        });
      });
    });
  </script>
  
</body>
</html>
