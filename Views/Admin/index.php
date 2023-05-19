<?php
include "./header.php";
// include "../../Database/Admin.class.php"
?>
<?php
$count = new Admin();

$teacher = $count->countTeacher();
$student = $count->countStudent();
$course = $count->countCourse();
$order = $count->countOrder();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container_chart {
            width: 1200px;
            position: absolute;
            left: 20%;
            top: 29%;
        }
    </style>
</head>
  <body>
  <div class="container_chart">
  <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
      
      <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Teacher', 'Student', 'Course', "Order"],
            datasets: [{
              label: 'Sales',
              data: [<?php echo $teacher; ?>, <?php echo $student; ?>, <?php echo $course; ?>,<?php echo $order; ?>],
              backgroundColor: [
                '#34425A',
                '#34425A',
                '#34425A',
                '#34425A',
              ],
              borderColor: [
                '#34425A',
                '#34425A',
                '#34425A',
                '#34425A',
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      </script>

  </div>



    
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<script>
    
    var Home = document.querySelector("._menu_home__");
    Home.style.background = "#FFA500";
</script>