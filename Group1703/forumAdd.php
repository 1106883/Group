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

            <form  name="postAdd" Method ="post" action = "forumAdder.php">
                <table>
                <tr>
                    <td><label for="postTitle">Title :</label></td>
                    <td><input id="postTitle" name="postTitle" type="text"/></td>
                </tr>
                <tr>
                    <td><label for="postContent">Content :</label></td>
                    <td><input id="postContent" name="postContent" type="text"/></td>
                </tr>
                </table>
                    <input type="submit" value="Post">

        </div>
        <br class="clearfix" />
    </div>
    <div id="footer">
        &copy; 2016. All rights reserved. Design by <strong>GROUP C</strong>.
    </div>
</div>
</body>


</html>