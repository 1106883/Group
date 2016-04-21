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
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$bID = $_GET['feedback'];
$feedback = $_GET['feedbackRating'];


$query = "Select borrowerID FROM borrow WHERE borrow.borrowID = '$bID' Insert into feedback (borrowID, borrowerID, feedbackScore) Values ('$bID', borrowerID, '$feedback')";
try {
    $results = $conn->query($query);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
header("Location:home.php");
?>