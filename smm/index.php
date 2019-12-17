<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/e6e83e02f8.js" crossorigin="anonymous" integrity="sha384-YWiI0Cli0o/bFXCXg9qonZOGKZU9t3wy1U9oYWWmKJif85uQBcNQ2wlP91aRxKnV"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="../node_modules/chart.js/dist/Chart.bundle.min.js"></script>
        <style>

            html {
                margin: 0px;
                padding: 0px;
            }
            
            body {
                margin: 0px;
                padding: 0px;
                webkit-font-smoothing: antialiased;
                text-rendering: optimizeLegibility;
                font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Arial,sans-serif;
                background-color: #f0f2f5;
            }

            h1 {
                margin-top: 5px;
                margin-bottom: 10px;
                color: #162e4b;
                font-size: 2em;
            }

            h2 {
                margin-top: 5px;
                margin-bottom: 10px;
                color: #162e4b;
                font-size: 1.5em;
            }

            h3 {
                margin-top: 3px;
                margin-bottom: 5px;
                color: #162e4b;
                font-size: 1em;
            }

            p {
                color:rgb(96, 98, 102);
                font-size: 0.9em;
            }

            .no-padding {
                padding: 0px !important;
            }
        
            #sidebar {
                background-color: rgb(48, 65, 86);
                width: 60px;
                height: 100%;
                position: fixed;
                transition: 0.5s;
                z-index: 900;
                overflow: hidden;
                overflow-y: auto;
                top: 0px;
                -webkit-touch-callout: none; 
                -webkit-user-select: none; 
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none; 
                user-select: none;
            }

            #sidebar.open {
                width: 210px;
            }

            #sidebar .sidebar-item:hover, #sidebar .sidebar-item .submenu-open {
                background-color: #263445!important;
            }

            #sidebar .sidebar-item.menu-toggle {
                border-bottom: 1px solid rgba(191, 203, 217, 0.3);
            }

            #sidebar .sidebar-item a {
                color: rgb(191, 203, 217);
                padding: 0 20px;
                text-decoration: none;
                white-space: nowrap;
                font-size: 14px;
                height: 56px;
                width: 100%;
                display: block;
                line-height: 56px;
                box-sizing: border-box;
            }

            #sidebar .sidebar-item.active a {
                color:rgb(64, 158, 255);
            }

            #sidebar .sidebar-item span {
                display: none;
            }

            #sidebar.open .sidebar-item span {
                display: inline-block;
            }

            #sidebar .sidebar-item.has-submenu > a > span::after {
                content: "\f078";
                font-family: "Font Awesome 5 Pro";
                color: rgb(191, 203, 217);
                position: absolute;
                right: 20px;
                font-size: 12px;
                font-weight: 100;
                opacity: 0.5;
            }

            #sidebar .sidebar-item.has-submenu > a.submenu-open > span::after {
                content: "\f077";
            }

            #sidebar .sidebar-item i {
                margin-right: 10px;
                text-decoration: none;
            }

            #sidebar .sidebar-submenu {
                display: none;
            }

            #sidebar .sidebar-submenu.open {
                display: block;
                background-color: #263445!important;
            }

            #sidebar .sidebar-submenu.open .sidebar-item:hover {
                background-color: #001528!important;
            }

            #sidebar.open .sidebar-submenu .sidebar-item a {
                padding-left: 40px;
            }

            #sidebar.open .sidebar-submenu .sidebar-item .sidebar-submenu .sidebar-item a {
                padding-left: 60px;
            }

            #sidebar.open .sidebar-submenu .sidebar-item .sidebar-submenu .sidebar-item .sidebar-submenu .sidebar-item a {
                padding-left: 80px;
            }

            #nav {
                background-color:rgb(255, 255, 255);
                position: fixed;
                top: 0px;
                width: calc(100% - 60px);
                margin-left: 60px;
                height: 56px;
                transition: 0.5s;
                box-sizing: border-box;
                box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
                z-index: 800;
                display: flex;
            }

            #nav.open {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            #nav #page-active-nav {
                font-size: 16px;
                line-height: 56px;
                margin: 0px;
                margin-left: 30px;
                width: calc(100% - 80px);
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                font-weight: 100;
                color: rgb(113, 132, 155);
            }

            #nav #page-active-nav a {
                color: inherit;
                text-decoration: none;
            }

            #nav #page-active-nav a:hover {
                color: rgb(64, 158, 255);
            }

            #nav #nav-menu {
                font-size: 16px;
                line-height: 56px;
                margin: 0px;
                width: 45px;
                color: rgb(102, 102, 102);
                cursor: pointer;
                flex-grow: 1;
                text-align: center;
                position: relative;
                display: flex;
                justify-content: center;
            }

            #nav #nav-menu:hover {
                background: rgba(0, 0, 0, 0.025);
            }

            #nav #nav-menu .nav-menu-icon {
                font-size: 26px;
                line-height: 56px;
            }

            #nav #nav-menu .nav-menu-toggle {
                font-size: 14px;
                line-height: 56px;
                margin-left: 3px;
            }

            #nav #nav-menu.open ul {
                transform:scaleY(1);
            }

            #nav #nav-menu ul {
                transition:transform 0.1s ease-out; 
                transform:scaleY(0);
                transform-origin:top;
                position: absolute;
                padding: 0px;
                list-style: none;
                border: 1px solid rgb(230, 235, 245);
                background-color: #fff;
                z-index: 850;
                right: 6px;
                top: 46px;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 12px 0px;
                border-radius: 4px;
                box-sizing: border-box;
                white-space: nowrap;
                padding: 5px 0px;
            }

            #nav #nav-menu ul .menu-arrow {
                top: -12px;
                left: 75%;
                margin-right: 3px;
                border-top-width: 0;
                border-color: transparent;
                border-bottom-color: #fff;
                position: absolute;
                display: block;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 6px;
                filter: drop-shadow(0 2px 12px rgba(0, 0, 0, 0.03));
            }

            #nav #nav-menu ul .menu-arrow::after {
                content: '';
                position: absolute;
                display: block;
                width: 0;
                height: 0;
                border-color: transparent;
                border-style: solid;
                top: 1px;
                margin-left: -5px;
                border-top-width: 0;
                border-bottom-color: #FFFFFF;
            }

            #nav #nav-menu ul a {
                text-decoration: none;
            }

            #nav #nav-menu ul li {
                color:rgb(96, 98, 102);
                cursor:pointer;
                font-size:14px;
                line-height:34px;
                padding: 0 17px;
            }

            #nav #nav-menu ul li:hover {
                background-color: #e8f4ff;
                color: #46a6ff;
            }

            #nav #nav-menu hr {
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid rgb(241, 241, 241);
                margin: 5px 0;
                padding: 0;
            }

            #app {
                margin-left: 60px;
                overflow: hidden;
                min-height: calc(100vh - 56px);
                width: calc(100% - 60px);
                transition: 0.5s;
                padding: 25px;
                margin-top: 56px;
                box-sizing: border-box;
            }

            #app.open {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            /* Containers */
            .container {
                width: 100%;
                margin: 15px 0px;
                padding: 10px;
                box-sizing: border-box;
                box-shadow: 4px 4px 40px rgba(0, 0, 0, 0.05);;
                position: relative;
                background-color: #fff;
                min-height: 90px;
                overflow: auto;
                flex-grow: 1;
                border-radius: 4px;
            }


            .container:after {
                content: "";
                clear: both;
                display: table;
            }

            .containerSplit {
                display: flex;
                flex-wrap: wrap;
                margin: 0px -15px;
            }

            .containerSplit .container {
                width: calc(100% - 30px);
                margin: 15px;
            }

            .containerSplit.halfContainer .container {
                width: calc(50% - 30px);
            }

            .containerSplit.thirdContainer .container {
                width: calc(33.33% - 30px);
            }

            .containerSplit.thirdContainer .container.twoThirds {
                width: calc(66.66% - 30px);
            }

            .containerSplit.quarterContainer .container {
                width: calc(25% - 30px);
            }

            .containerSplit.quarterContainer .container.twoQuarters {
                width: calc(50% - 30px);
            }

            .containerSplit.quarterContainer .container.threeQuarters {
                width: calc(75% - 30px);
            }

            .container > h2 {
                margin: -10px;
                border-bottom: 1px solid #e0e0e0;
                padding: 10px;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .container.no-padding > h2 {
                margin: 0px;
            }

            .container > h2 .icon {
                font-size: 18px;
            }

            .container > h2 .button {
                margin-top: -5px;
            }

            .container h3 {
                border-bottom: 1px solid #eaeaea;
                color: #717171;
                padding-bottom: 10px;
                padding-left: 10px;
                margin-right: -10px;
                margin-bottom: 5px;
            }

            /* Stats Container */
            .stats {
                display: flex;
                flex-wrap: wrap;
                margin: 0px -15px;
            }

            .stats-container {
                width: calc(25% - 30px);
                margin: 15px;
                padding: 10px;
                box-sizing: border-box;
                box-shadow: 4px 4px 40px rgba(0, 0, 0, 0.05);;
                position: relative;
                background-color: #fff;
                height: 120px;
                overflow: auto;
                flex-grow: 1;
                display: flex;
                cursor: pointer;
                border-radius: 4px;
            }

            .stats-container i {
                position: absolute;
                align-self: center;
                font-size: 60px;
                width: 85px;
                height: 85px;
                line-height: 85px;
                text-align: center;
                color: #c8d9ee;
                transition: 0.5s;
                border-radius: 5px;
                margin-left: 7px;
                box-sizing: border-box;
                padding-top: 2px;
            }

            .stats-container.blue-icon i {
                color: rgb(54, 163, 247);
            }

            .stats-container.green-icon i {
                color: rgb(52, 191, 163);
            }

            .stats-container.red-icon i {
                color: rgb(244, 81, 108);
            }

            .stats-container i:hover {
                color: #fff;
                background-color: #c8d9ee;
            }

            .stats-container.blue-icon i:hover {
                background-color: rgb(54, 163, 247);
            }

            .stats-container.green-icon i:hover {
                background-color: rgb(52, 191, 163);
            }

            .stats-container.red-icon i:hover {
                background-color: rgb(244, 81, 108);
            }

            .stats-container div {
                align-self: center;
                text-align: right;
                margin-right: 7px;
                margin-left: 120px;
                width: calc(100% - 120px);
            }

            .stats-container div span {
                display: block;
            }

            .stats-container div .stats-title {
                color: rgba(0, 0, 0, 0.45);
                font-size: 16px;
                font-weight: 700;
                margin-bottom: 12px;
            }

            .stats-container div .stats-details {
                color: rgb(102, 102, 102);
                font-size: 20px;
                font-weight: 700;
                line-height: 23px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            /* Table */
            .table-container {
                overflow-x: auto;
                width: 100%;
            }

            table {
                width: 100%;
            }

            table thead th {
                border-bottom: 1px solid #dfe6ec;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: normal;
                word-break: break-all;
                line-height: 23px;
                padding-left: 10px;
                padding-right: 10px;
                color:rgb(144, 147, 153);
                font-size:14px;
                font-weight:700;
                text-align: left;
                padding-top: 15px;
                min-width: 50px;
            }

            table tbody td {
                padding: 10px 0;
                border-bottom: 1px solid #dfe6ec;
                text-align: left;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: normal;
                word-break: break-all;
                line-height: 23px;
                padding-left: 10px;
                padding-right: 10px;
                color:rgb(96, 98, 102);
                font-size:14px;
                min-width: 50px;
            }

            /* Status tags */

            .status-tag {
                display: inline-block;
                height: 28px;
                line-height: 26px;
                padding: 0 10px;
                font-size: 12px;
                border-width: 1px;
                border-style: solid;
                border-radius: 4px;
                box-sizing: border-box;
                white-space: nowrap;
            }

            .status-tag.status-red {
                background-color: #ffeded;
                border-color: #ffdbdb;
                color: #ff4949;
            }

            .status-tag.status-green {
                background-color: #e7faf0;
                border-color: #d0f5e0;
                color: #13ce66;
            }

            .status-tag.status-yellow {
                background-color: #fff8e6;
                border-color: #fff1cc;
                color: #ffba00;
            }

            .status-tag.status-blue {
                background-color: #e8f4ff;
                border-color: #d1e9ff;
                color: #1890ff;
            }

            @media all and (max-width: 1300px) {

                .stats-container {
                     width: calc(50% - 30px);
                }

            }

            @media all and (max-width: 768px) {

                #sidebar {
                    height: 56px;
                    top: 0px;
                    transition: 0.1s;
                    box-shadow: 0 1px 4px rgba(0, 21, 41, 0.08);
                    overflow-y: hidden;
                }

                #sidebar.open {
                    overflow-y: auto;
                }

                #nav {
                    margin-left: 60px;
                    transition: 0.1s;
                }

                #app {
                    margin-left: 0px;
                    margin-top: 56px;
                    transition: 0.1s;
                }

                #sidebar.open {
                    width: 100%;
                    height: 100%;
                }

                .stats-container {
                     width: calc(100% - 30px);
                }

                .containerSplit.halfContainer .container , .containerSplit.thirdContainer .container, .containerSplit.thirdContainer .container.twoThirds, .containerSplit.quarterContainer .container, .containerSplit.quarterContainer .container.twoQuarters, .containerSplit.quarterContainer .container.threeQuarters {
                    width: calc(100% - 30px);
                }

            }
        
        </style>

    </head>
    <body>

        <?php 
        $activeNav = "Dashboard";
        $additionalNav = "Test extra nav";
        include "structure/nav.php"; 
        ?>

        <div id="app">

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

        </script>

    </body>
</html>