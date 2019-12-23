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
        $activeNav = "General Settings";
        include "structure/nav.php"; 
        ?>

        <div id="app" class="<?= $_COOKIE["__Host-nav-control"] ? "open" : "" ?>">

            <div class="containerSplit halfContainer">

                <div class="container">

                    <h2>Company Details</h2>

                </div>

                <div class="container">

                    <h2>System Settings</h2>

                </div>

            </div>

            <div class="containerSplit thirdContainer">

                <div class="container twoThirds">

                    <h2>Email Senders</h2>

                </div>

                <div class="container">

                    <h2>Email Statuses</h2>

                </div>

            </div>

            <h2>Company Users</h2>

            <div class="tableContainer">

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Michael Dodd</td>
                            <td>mike@wilxite.com</td>
                            <td>18/12/2019 12:23</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            
        </div>  

        <!-- Move to separate file -->
        <script>

  
        </script>

    </body>
</html>