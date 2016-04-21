<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}
$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bid = $_GET['borrowID'];
$feedback = (int)$_POST['feedbackRating'];

echo $bid." ".$feedback;


$sql = "INSERT INTO feedback (borrowID, borrowerID, feedbackScore) SELECT borrowerID, borrowID, '$feedback' FROM borrow WHERE borrowID = '$bID'";
$conn->exec($sql);


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
//header("Location:home.php");
?>