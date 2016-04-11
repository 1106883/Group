<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.html");
}?>




<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/design.css"/>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><strong><font size="20">GameShare RGU</font></strong></h1>
        </div>
        <div id="search">
            <Form Name ="login" action="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/login.php" method="post">
                <? if(!isset($_SESSION['username'])){
                    echo '
                    <font size="-2"><label for="username">Username :</label><input id="username" name="username" type="text" size="-2"/><label for="Password">Password :</label><input id="password" name="password" type="password" size="-2"/></font><input class="form-submit" type="submit" value="Login" />
                    <a id="register" href="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/registerDetails.php">Not a member? Register.</a>
               ';}
                else{
                    echo "Logged in as: ".$_SESSION['username'];
                    echo ' <form name="logout" action="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/logout.php" method="post">
                            <input id="logoutButton" type="submit" type="submit" value="Log Out">
                            </form>';
                }




                ?>
            </form>
        </div>
        <div id="menu">
            <form action="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/results.php" method="post">
                <ul>
                    <li><a href="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/index.html">Homepage</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="../../../AzureTest-master%20(3)/AzureTest-master/Group1703/Search.php">Search</a></li>
                    <li><input id="qsearch" name="qsearch" type="text" placeholder="I want to borrow..."/><input id="qsgo" type="submit"  value="Go"></li>
                </ul>
            </form>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="content">

      <main>
          <form action="DropDownAdd.php" method="post">
              <select name="platformSelectDrop">
                  <option value="%">Select Platform</option>
                  <option value="PS3">PS3</option>
                  <option value="PS4">PS4</option>
                  <option value="XBOX360">XBOX360</option>
                  <option value="XBOXONE">XBOXONE</option>
                  <option value="Wii">Wii</option>
                  <option value="Wii U">Wii U</option>

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