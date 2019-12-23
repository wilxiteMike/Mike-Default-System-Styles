<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/e6e83e02f8.js" crossorigin="anonymous" integrity="sha384-YWiI0Cli0o/bFXCXg9qonZOGKZU9t3wy1U9oYWWmKJif85uQBcNQ2wlP91aRxKnV"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="node_modules/chart.js/dist/Chart.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css" />

    </head>
    <body>

        <?php 
        $activeNav = "Dashboard";
        $additionalNav = "Test extra nav";
        include "structure/nav.php"; 
        ?>

        <div id="app" class="<?= $_COOKIE["__Host-nav-control"] ? "open" : "" ?>">

            <h1>Welcome Michael to Shoot My Mail</h1>

            <div class="stats">

                <a class="stats-container blue-icon">
                
                    <i class="fas fa-users"></i>

                    <div>
                        <span class="stats-title">Total Recipients</span>
                        <span class="stats-details">1,234</span>
                    </div>

                </a>

                <a class="stats-container green-icon">
                
                    <i class="fas fa-paper-plane"></i>

                    <div>
                        <span class="stats-title">Total Emails Sent</span>
                        <span class="stats-details">102,432</span>
                    </div>

                </a>

                <a class="stats-container red-icon">
                
                    <i class="fas fa-exclamation-circle"></i>

                    <div>
                        <span class="stats-title">Total Emails Errors</span>
                        <span class="stats-details">102</span>
                    </div>

                </a>

                <a class="stats-container blue-icon">
                
                    <i class="fas fa-envelope"></i>

                    <div>
                        <span class="stats-title">Latest Email</span>
                        <span class="stats-details">E-newsletter with a very long title that goes on forever and ever</span>
                    </div>

                </a>

            </div>

            <div class="container">

                <canvas id="testChart" ></canvas>
            
            </div>

            <div class="containerSplit thirdContainer">

                <div class="container twoThirds no-padding">
                    <h2>Email Queue</h2>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th width="200px">Email Subject</th>
                                    <th width="100px">Send Date</th>
                                    <th width="100px">Status/ Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>E-newsletter with a very long title that goes on forever and ever</td>
                                    <td>25/12/2019 12:00</td>
                                    <td><span class="status-tag status-yellow">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>E-newsletter with a very long title that goes on forever and ever</td>
                                    <td>25/12/2019 12:00</td>
                                    <td><span class="status-tag status-red">Cancelled</span></td>
                                </tr>
                                <tr>
                                    <td>E-newsletter with a very long title that goes on forever and ever</td>
                                    <td>16/12/2019 15:23</td>
                                    <td><span class="status-tag status-blue">Queuing 15/3000</span></td>
                                </tr>
                                <tr>
                                    <td>E-newsletter with a very long title that goes on forever and ever</td>
                                    <td>25/12/2019 12:00</td>
                                    <td><span class="status-tag status-blue">Sending 99/100</span></td>
                                </tr>
                                <tr>
                                    <td>E-newsletter with a very long title that goes on forever and ever</td>
                                    <td>25/12/2019 12:00</td>
                                    <td><span class="status-tag status-green">Sent</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container">
                    <!--<h2>Recipient Stats</h2>-->
                    <br>
                    <canvas id="testchart2"></canvas>
                    <br>
                </div>

            </div>

        </div>  

        <!-- Move to separate file -->
        <script>

            var ctx = document.getElementById('testChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['August 2019', 'September 2019', 'August 2019', 'October 2019', 'November 2019', 'December 2019'],
                    datasets: [{
                        label: '# of Emails per Month',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                        }]
                    },
                    aspectRatio: 3.5
                }
            });

            var ctx2 = document.getElementById("testchart2")
            
            var myChart2 = new Chart(ctx2, {
                "type":"polarArea",
                "data":{
                    "labels":["Group 1","Group 2","Group 3","Group 4","Group 5"],
                    "datasets":[
                        {"label":"Most Popular Groups",
                        "data":[11,16,7,3,14],
                        "backgroundColor":["rgba(255, 99, 132, 0.5)","rgba(75, 192, 192, 0.5)","rgba(255, 205, 86, 0.5)","rgba(201, 203, 207, 0.5)","rgba(54, 162, 235, 0.5)"]}
                    ]
                },
                "options": {
                    "legend": {
                        "position": 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Biggest Recipient Groups'
                    },
                    aspectRatio: 1.2
                }
            });

        </script>

    </body>
</html>