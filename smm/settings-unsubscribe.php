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
        $activeNav = "Unsubscribe Page";
        include "structure/nav.php"; 
        ?>

        <div id="app" class="<?= $_COOKIE["__Host-nav-control"] ? "open" : "" ?>">

            <div class="containerSplit halfContainer">

                <div class="container">

                    <h2>Unsubscribe Settings</h2>

                    test inputs for what sections say

                </div>

                <div class="container">

                    <h2>Theme Settings</h2>

                    colours and all that

                </div>

            </div>

            <h2>iFrame preview with tabs for each screen</h2>
            
        </div>  

        <!-- Move to separate file -->
        <script>

  
        </script>

    </body>
</html>