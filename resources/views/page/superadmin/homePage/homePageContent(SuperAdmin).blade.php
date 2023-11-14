<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Super aAdmin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/Logo1 (1).png" />
    <style>
      .logo-image {
          width: 200px !important;
          height: 100px !important;
          
      }
  
      .mini-logo-image {
          width: 100px !important;
          height: 50px !important;
      }

      nav{
        background-color: #F8F9F9 !important;
      }
      
      .bgcolor{
        background-color: #F8F9F9 !important;
      }
      /* CSS for the minimized sidebar */
      .sidebar-minimized {
        width: 70px; /* Adjust as needed */
      }

      /* CSS for the expanded main panel */
      .main-panel-expanded {
        margin-left: 70px !important; /* Adjust to match your sidebar width */
        transition: margin-left 0.3s ease; /* Smooth transition */
      }

      @media screen and (max-width: 950px) {
        .sidebar-minimized {
          width: 70%; /* Adjust as needed */
        }

        .main-panel{
          margin-left: 0 !important;
        }

        .main-panel-expanded {
          margin-left: 0 !important; /* Adjust to match your sidebar width */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a shadow */
          transition: margin-left 0.3s ease; /* Smooth transition */
        }

      }

  </style>
  </head>
  <body>
        <!-- partial -->
        <div class="main-panel" id="mainPanel" style="margin-left: 260px;">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Home
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Participants<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4><br>
                    @if(isset($participantsCount))
                      <h2 class="mb-5">{{ $participantsCount }}</h2>
                    @else
                      <h2 class="mb-5">No Record</h2>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Submission<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4><br>
                    @if(isset($submissionsCount))
                      <h2 class="mb-5">{{ $submissionsCount }}</h2>
                    @else
                      <h2 class="mb-5">No Record</h2>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Reviewer<i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4><br>
                    @if(isset($reviewersCount))
                      <h2 class="mb-5">{{ $reviewersCount }}</h2>
                    @else
                      <h2 class="mb-5">No Record</h2>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left"><br><br><br>Category Amount</h4>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Total Collect</h4>
                    <canvas id="traffic-chart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Project Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Reviewer </th>
                            <th> Progress </th>
                          </tr>
                        </thead>
                        @if(isset($checksubmission))
                        <tbody>
                          @foreach($checksubmission as $checksubmission)
                          <tr>
                            <td>{{ $checksubmission->submissionCode }}</td>
                            <td>{{ $checksubmission->reviewerID }}</td>
                            <td>{{ $checksubmission->reviewStatus}}</td>
                          </tr>
                          @endforeach
                          @else
                            <tr style="color: black;">
                              <td colspan="8">
                                No record found.
                              </td>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Today Work</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" id="new-task-input">
                      <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
                    </div>
                    <div class="list-wrapper">
                    @if(isset($tasks) && count($tasks) > 0)
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        @foreach($tasks as $tasks)
                          <li>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> {{ $tasks->task }}</label>
                            </div>
                            <i class="remove mdi mdi-close-circle-outline" data-task-id="{{ $tasks->id }}"></i>
                          </li>
                          @endforeach
                        </ul>
                    @else
                      <p>No tasks found.</p>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- Footer-->
          @include('page.footer(Super)')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      document.addEventListener("DOMContentLoaded", function () {
        const addTaskBtn = document.getElementById("add-task");
        const newTaskInput = document.getElementById("new-task-input");
        const taskList = document.getElementById("task-list");

        addTaskBtn.addEventListener("click", function () {
            const taskText = newTaskInput.value.trim();

            if (taskText !== "") {
                axios.post('{{ route("tasks.store") }}', { task: taskText })
                    .then(response => {
                        // Reload the page to reflect the newly added task
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Error adding task:', error);
                    });
            }
        });

        const removeButtons = document.querySelectorAll('.remove');

        removeButtons.forEach(btn => {
            btn.addEventListener('click', function (event) {
                const taskId = event.target.getAttribute('data-task-id');

                axios.delete(`/tasks/${taskId}`)
                    .then(response => {
                        // Reload the page after successful deletion to reflect the updated list
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Error deleting task:', error);
                    });
            });
        });
      });

      $(document).ready(function() {
        $(".navbar-toggler").click(function() {
          $("#sidebar").toggleClass("sidebar-minimized");
          $("#mainPanel").toggleClass("main-panel-expanded");
        });
      });

      $(document).ready(function(){
        if ($("#visit-sale-chart").length) {
          Chart.defaults.global.legend.labels.usePointStyle = true;
          var ctx = document.getElementById('visit-sale-chart').getContext("2d");

          var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
          gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
          var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
          
          var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
          gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
          gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
          var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

          var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
          gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
          gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
          var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

          var amounts = @json($amounts); // Convert the PHP array to a JavaScript object

            var data = Object.values(amounts);

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(amounts),
                    datasets: [
                        {
                            label: "Quantity",
                            borderColor: gradientStrokeBlue,
                            backgroundColor: gradientStrokeBlue,
                            hoverBackgroundColor: gradientStrokeBlue,
                            legendColor: gradientLegendBlue,
                            pointRadius: 0,
                            fill: false,
                            borderWidth: 1,
                            fill: 'origin',
                            data: data, // Use the dynamically generated data array
                        }
                    ]
                },
                options: {
                    // ... (other options)
                },
            options: {
              responsive: true,
              legend: false,
              legendCallback: function(chart) {
                var text = []; 
                text.push('<ul>'); 
                for (var i = 0; i < chart.data.datasets.length; i++) { 
                    text.push('<li><span class="legend-dots" style="background:' + 
                              chart.data.datasets[i].legendColor + 
                              '"></span>'); 
                    if (chart.data.datasets[i].label) { 
                        text.push(chart.data.datasets[i].label); 
                    } 
                    text.push('</li>'); 
                } 
                text.push('</ul>'); 
                return text.join('');
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          display: false,
                          min: 0,
                          stepSize: 20,
                          max: 80
                      },
                      gridLines: {
                        drawBorder: false,
                        color: 'rgba(235,237,242,1)',
                        zeroLineColor: 'rgba(235,237,242,1)'
                      }
                  }],
                  xAxes: [{
                      gridLines: {
                        display:false,
                        drawBorder: false,
                        color: 'rgba(0,0,0,1)',
                        zeroLineColor: 'rgba(235,237,242,1)'
                      },
                      ticks: {
                          padding: 20,
                          fontColor: "#9c9fa6",
                          autoSkip: true,
                      },
                      categoryPercentage: 0.5,
                      barPercentage: 0.5
                  }]
                }
              },
              elements: {
                point: {
                  radius: 0
                }
              }
          })
          $("#visit-sale-chart-legend").html(myChart.generateLegend());
        }
        if ($("#traffic-chart").length) {
          var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
          gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
          var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

          var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
          gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
          gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
          var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

          var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
          gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
          gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
          var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';
          
          var gradientStrokePurple = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokePurple.addColorStop(0, 'rgba(159, 89, 204, 1)');
          gradientStrokePurple.addColorStop(1, 'rgba(102, 51, 153, 1)');
          var gradientLegendPurple = 'linear-gradient(to right, rgba(159, 89, 204, 1), rgba(102, 51, 153, 1))';

          var gradientStrokeOrange = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokeOrange.addColorStop(0, 'rgba(255, 165, 0, 1)');
          gradientStrokeOrange.addColorStop(1, 'rgba(255, 87, 34, 1)');
          var gradientLegendOrange = 'linear-gradient(to right, rgba(255, 165, 0, 1), rgba(255, 87, 34, 1))';

          var gradientStrokeGold = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokeGold.addColorStop(0, 'rgba(255, 215, 0, 1)');
          gradientStrokeGold.addColorStop(1, 'rgba(218, 165, 32, 1)');
          var gradientLegendGold = 'linear-gradient(to right, rgba(255, 215, 0, 1), rgba(218, 165, 32, 1))';

          var gradientStrokePink = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokePink.addColorStop(0, 'rgba(255, 182, 193, 1)');
          gradientStrokePink.addColorStop(1, 'rgba(255, 105, 180, 1)');
          var gradientLegendPink = 'linear-gradient(to right, rgba(255, 182, 193, 1), rgba(255, 105, 180, 1))';
          
          var gradientStrokeTeal = ctx.createLinearGradient(0, 0, 0, 181);
          gradientStrokeTeal.addColorStop(0, 'rgba(0, 128, 128, 1)');
          gradientStrokeTeal.addColorStop(1, 'rgba(0, 206, 209, 1)');
          var gradientLegendTeal = 'linear-gradient(to right, rgba(0, 128, 128, 1), rgba(0, 206, 209, 1))';

          // var dataByYear = @json($dataByYear);

          // var categoryAmounts = Object.values(dataForSelectedYear.amountEachCategory);

          var trafficChartData = {
            datasets: [{
              data: [20,30,20,40,50,20,70,80],
              backgroundColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed,
                gradientStrokePurple,
                gradientStrokeOrange,
                gradientStrokeGold,
                gradientStrokePink,
                gradientStrokeTeal
              ],
              hoverBackgroundColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed,
                gradientStrokePurple,
                gradientStrokeOrange,
                gradientStrokeGold,
                gradientStrokePink,
                gradientStrokeTeal
              ],
              borderColor: [
                gradientStrokeBlue,
                gradientStrokeGreen,
                gradientStrokeRed,
                gradientStrokePurple,
                gradientStrokeOrange,
                gradientStrokeGold,
                gradientStrokePink,
                gradientStrokeTeal
              ],
              legendColor: [
                gradientLegendBlue,
                gradientLegendGreen,
                gradientLegendRed,
                gradientLegendPurple,
                gradientLegendOrange,
                gradientLegendGold,
                gradientLegendPink,
                gradientLegendTeal
              ]
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
              'TVT', 'SSC', 'ITC', 'EHE', 'REE', 'COM', 'MD','OTH'
            ]
          };
          var trafficChartOptions = {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: false,
            legendCallback: function(chart) {
              var text = []; 
              text.push('<ul>'); 
              for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
                  text.push('<li><span class="legend-dots" style="background:' + 
                  trafficChartData.datasets[0].legendColor[i] + 
                              '"></span>'); 
                  if (trafficChartData.labels[i]) { 
                      text.push(trafficChartData.labels[i]); 
                  }
                  text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+"%"+'</span>')
                  text.push('</li>'); 
              } 
              text.push('</ul>'); 
              return text.join('');
            }
          };
          var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
          var trafficChart = new Chart(trafficChartCanvas, {
            type: 'doughnut',
            data: trafficChartData,
            options: trafficChartOptions
          });
          $("#traffic-chart-legend").html(trafficChart.generateLegend());      
        }
      })(jQuery);
      </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>