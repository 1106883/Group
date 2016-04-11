<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.html");
}

error_reporting(-1);

$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";

    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "";

    $title = $_POST['title'];

    $year = $_POST['year'];

    $genre = $_POST['genre'];

    $platform = $_POST['platform'];

    $age = $_POST['age'];
    
    $desc= $_POST['desc'];


    $sql = "INSERT INTO gamecollection (Title, Year, Genre, Platform, Age_Rating, Description) VALUES ('$title', '$year', '$genre', '$platform', '$age','$desc')";


    $conn->exec($sql);
    echo "New record created successfully";
    header("Location:addTitlePlatform.php");




$conn = null;
?>