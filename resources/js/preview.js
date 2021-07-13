$(document).ready(function () {
    var url = window.location.href;
    $.ajax({
      type: 'GET',
      url: '/chart',
      cache: false,
      success: function success(result) {
        var myLabels = Object.keys(result);
        var myData = Object.values(result);
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: myLabels,
            datasets: [{
              label: 'Number of lessons',
              data: myData,
              backgroundColor: '#007575',
              borderColor: '#007575',
              borderWidth: 1,
              fill: false,
              tension: 0,
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 1
                }
              }],
            }
          }
        });
      }
    });
  });
