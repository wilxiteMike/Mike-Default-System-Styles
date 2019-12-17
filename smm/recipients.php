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
        $activeNav = "Recipients";
        include "structure/nav.php"; 
        ?>

        <div id="app">

            <div class="filter-container" style="display: flex">
                <div class="input-container no-margin">
					<input type="text" name="email" placeholder="Email" />
				</div>
				<div class="input-container no-margin">
					<input type="password" name="name" placeholder="Name" />
                </div>
                <div class="button blue">Search</div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Groups</th>
                            <th>Latest Email</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>  

        <!-- Move to separate file -->
        <script>

  
        </script>

    </body>
</html>