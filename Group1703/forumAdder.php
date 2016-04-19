<?
$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";
try {
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title=$_POST['postTitle'];
$content=$_POST['postContent'];


$sql = "INSERT INTO forum (postTitle, postContent) Values ('$title','$content')";

$conn->exec($sql);

} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

$conn = null;
header("Location:forum.php")
?>