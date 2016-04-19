<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}

try {
$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $status=$_POST['StatusSelectDrop'];
    $copy=$_GET['copy'];

    $sql = "UPDATE owns SET status='$status' WHERE copyID = '$copy'";
    $conn->exec($sql);

} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

header("Location:memberSite.php");

?>