<? session_start();
if (!isset($_SESSION['username'])) {
    header("Location:home.php");}


error_reporting(-1);

$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";
try {    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "";
    $query = "";

    $id=$_SESSION['username'];
    $condition=$_POST['conditionGame'];
    $gameID=$_POST['Titles'];



   

    $query = "INSERT INTO owns (gameID, studentID, game_condition) VALUES ('$gameID','$id','$condition')";









    $conn->exec($query);
    //$copy += 1;



   /* $sql = "INSERT INTO owns (gameID, studentID, copyID, game_condition) VALUES ('$gameID','$id','$copy','$condition')";*/


    //$conn->exec($sql);
    echo "New record created successfully";



} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>
