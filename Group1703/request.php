<?php session_start();?>
<!DOCTYPE html>

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
                }?>
            </form>
        </div>
        <div id="menu">
            <form action="results.php" method="post">
                <ul>
                    <li><a href="home.php">Homepage</a></li>
                    <li><a href="memberSite.php">Profile</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="Search.php">Search</a></li>
                    <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo" type="submit"  value="Go"></li>
                </ul>
            </form>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="content">
            <?

            error_reporting(-1);

            $dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
            $username = "b52b6c6935c6d2";
            $password = "26ebeed0";
            try {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $copy=$_GET['copy'];
                $sdate=$_POST['sdate'];
                $edate=$_POST['edate'];


                $sql = "INSERT INTO borrow (borrowerID, loanerID, gameID, copyID, start_date, end_date)
                            SELECT * From owns (".$_SESSION['username'].", owns.studentID, owns.gameID, '$copy', '$sdate', '$edate')
                            Where copyID = $copy ";

                $conn->exec($sql);

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
            ?>

            <table  style="width:300px" >
                <form  name="search" Method ="post" action = "confirm.php">

                    <tr>
                        <td><label for="Start Date">Start Date :</label></td>
                        <td><input type="date" name="Start Date">
                    <tr>
                        <td><label for="End Date">End Date :</label></td>
                        <td><input type="date" name="End Date">
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit"  value="Confirm">

                        </td>
                    </tr>
                </form>
            </table>
        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>


</html>