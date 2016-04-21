<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="design.css"/>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><strong><font size="20">GameShare RGU</font></strong></h1>
        </div>
        <div id="search">
            <Form Name ="login" action="login.php" method="post">


                <? if(!isset($_SESSION['username'])){
                    echo '
                    <font size="-2"><label for="username">Username :</label><input id="username" name="username" type="text" size="-2"/><label for="Password">Password :</label><input id="password" name="password" type="password" size="-2"/></font><input class="form-submit" type="submit" value="Login" />
                    <a id="register" href="registerDetails.php">Not a member? Register.</a>
               ';}
                else{
                    echo "Logged in as: ".$_SESSION['username'];
                    echo ' <form name="logout" action="logout.php" method="post">
                            <input id="logoutButton" type="submit" type="submit" value="Log Out">
                            </form>';
                }




                ?>
            </form>

        </div>
        <div id="menu">
            <form action="results.php" method="post">
                <ul>
                    <li><a href="home.php">Homepage</a></li>
                    <li><a href="memberSite.php">Profile</a></li>
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="Search.php">Search</a></li>
                    <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo" type="submit"  value="Go"></li>
                </ul>
            </form>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="content">
            <div id='resultsdiv'>
                <?php

                //header("Location:results.html");

                error_reporting(-1);

                $dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
                $username = "b52b6c6935c6d2";
                $password = "26ebeed0";
                try {
                    $conn = new PDO($dsn, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }

                $title = $_GET['borrow'];


                $query = "SELECT gameCollection.Title, gameCollection.Platform, owns.studentID, owns.copyID FROM owns INNER JOIN gameCollection ON owns.GameID = gameCollection.gameID WHERE gameCollection.title LIKE '%$title%' AND status = 'Available'";
                try {
                    $results = $conn->query($query);

                    if ($results->rowcount() == 0) {
                        echo "We're sorry, but the game you have requested is currently on loan <br />";
                    } else {

                        print "<table id='borrowTable'>\n";
                        echo "<th>Title</th><th>Platform</th><th>Student ID</th><th>Copy ID</th><th>Start Date</th><th>End Date</th><th>Borrow</th>";
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["Title"] . "</td>";
                            echo "<td>" . $row['Platform'] . "</td>";
                            echo "<td>" . $row["studentID"] . "</td>";
                            echo "<td>" . $row["copyID"] . "</td>";
                            echo "<form id='borrow' action='request.php?copy=".$row["copyID"]."' method='POST'>";
                            echo "<td><input type='text' placeholder='yyyy-mm-dd' id='sdate' name='sdate'></td>";
                            echo "<td><input type='text' placeholder='yyyy-mm-dd' id='edate' name='edate'></td>";
                            echo "<td><button id='Request' name='Borrow' value='".$row['copyID']."'>Request</button></form></td>";

                        }
                        print "</table>\n";
                    }
                } catch (PDOException $e) {
                    echo "Query failed: " . $e->getMessage();
                }
                $conn = null;

                ?>
            </div>
        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>
</html>