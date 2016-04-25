<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}?>

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
            <Form Name ="login" action="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/login.php" method="post">


                <? if(!isset($_SESSION['username'])){
                    echo '
                    <font size="-2"><label for="username">Username :</label><input id="username" name="username" type="text" size="-2"/><label for="Password">Password :</label><input id="password" name="password" type="password" size="-2"/></font><input class="form-submit" type="submit" value="Login" />
                    <a id="register" href="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/registerDetails.php">Not a member? Register.</a>
               ';}
                else{
                    echo "Logged in as: ".$_SESSION['username'];
                    echo ' <form name="logout" action="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/logout.php" method="post">
                            <input id="logoutButton" type="submit" type="submit" value="Log Out">
                            </form>';
                }?>
            </form>
        </div>
        <div id="menu">
            <form action="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/results.php" method="post">
                <ul>
                    <li><a href="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/home.php">Homepage</a></li>
                    <li><a href="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/memberSite.php">Profile</a></li>
                    <li><a href="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/forum.php">Forum</a></li>
                    <li><a href="../../../AzureTest-master%20(4)/AzureTest-master/Group1703/Search.php">Search</a></li>
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
                $user=$_SESSION['username'];


                $sql = "INSERT INTO borrow (borrowerID, loanerID, gameID, copyID, start_date, end_date)
                            SELECT ".$_SESSION['username'].", studentID, gameID, '$copy', '$sdate', '$edate'
                            From owns Where copyID = $copy ";

                $conn->exec($sql);

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
            ?>

            <table  style="width:300px" >
                <form  name="search" Method ="post" action="sendEmail.php">
                    <label for="confirm Email"> Please Confirm Your Email Address  </label><input type="email" name="confirmEmail" required>
                    <p>Please click confirm if you are happy to borrow copy</p>
                    <input type="submit" name="Confirm" value="Confirm">
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