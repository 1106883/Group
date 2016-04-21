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

            <main>
                <?$copy=$_GET['UStatus'];
                echo '<form action="StatusSQL.php?copy='.$copy.'" name="status" id="status" method="post">' ?>

                    <select name="StatusSelectDrop">
                        <option value="%">Select Status</option>
                        <option value="Available">Available</option>
                        <option value="Requested">Requested</option>
                        <option value="Accepted">Accepted</option>
                        <option value="Curently on loan">Currently on loan</option>
                        <option value="Returned">Returned</option>
                        <option value="Feedback left">Feedback left</option>

                    </select>

                    <br><br>
                    <input type="submit" value="Select">


                </form>


            </main>


        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>


</html>