<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formula 1</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        html{
            font-family: "Ubuntu", sans-serif;
            font-weight: 400;
            font-style: normal;
            background: url(https://www.kymillman.com/wp-content/uploads/f1/gallery/images/BEL%2023%20R31_4531.jpg) no-repeat center center fixed; 
            background-size: cover;
        }
        
        table {
            border-collapse: collapse;
            margin: 20px;
            margin-left: 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
            background-color: #fff;
        }
        th {
            background-color: #ddd;
        }

        h2{
        color: black;
        }

        .content-container{
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>

<?php

// Include files from other folders
include('reusable/conn.php');
include('reusable/nav.php'); 


// Collect data from Teams table
$teams_query = "SELECT * FROM teams";
$teams = mysqli_query($connect, $teams_query);

// Collect data from Drivers table
$drivers_query = "SELECT drivers.id, drivers.first_name, drivers.last_name, drivers.points, teams.team_name 
                FROM drivers 
                LEFT JOIN teams ON drivers.team_id = teams.team_id
                ORDER BY drivers.points DESC";
$drivers = mysqli_query($connect, $drivers_query);
?>

<div class="content-container">
    <div class="teams">
        <h2>Teams</h2>
            <table>
                <tr>
                    <th>Team Name</th>
                    <th>Engine Supplier</th>
                </tr>
    
                <?php 
                //loop through the table in database and display data as a table in Webpage
                foreach ($teams as $team)
                    echo '<tr>
                            <td>' . $team['team_name'] . '</td>
                            <td>' . $team['engine_supplier'] . '</td>
                          </tr>'
                ?>
            </table>
    </div>

    <div class="drivers">
        <h2>Drivers</h2>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Points</th>
                    <th>Team Name</th>
                </tr>   
                
                <?php 
                //loop through the table in database and display data as a table in Webpage
                foreach ($drivers as $driver){
                    echo '<tr>
                            <td>' . $driver['first_name'] . '</td>
                            <td>' . $driver['last_name'] . '</td>
                            <td>' . $driver['points'] . '</td>
                            <td>' . $driver['team_name'] . '</td>';
                }
                ?>
            </table>
    </div>
</div>

</body>
</html>


