<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- แก้โชว์ไอคอนเป็นสี่เหลี่ยม -->
        <link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css&#8221; />


        <title>test graph</title>

    </head>
    <body>

    <div id="chartContainer" style="height: 300px; width: 100%;"></div>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     <script>
      window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
          text: "Email Categories",
          horizontalAlign: "left"
        },
        data: [{
          type: "doughnut",
          startAngle: 60,
          //innerRadius: 60,
          indexLabelFontSize: 17,
          indexLabel: "{label} - #percent%",
          toolTipContent: "<b>{label}:</b> {y} (#percent%)",
          dataPoints: [
            { y: 67, label: "Inbox" },
            { y: 28, label: "Archives" },
            { y: 10, label: "Labels" },
            { y: 7, label: "Drafts"},
            { y: 15, label: "Trash"},
            { y: 6, label: "Spam"}
          ]
        }]
      });
      chart.render();

      }
      </script>

    </body>
</html>
