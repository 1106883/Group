<?php
 $email = $_POST["confirmEmail"];
$requester=$_SESSION['username'];

error_reporting(-1);

$dsn = "mysql:host=eu-cdbr-azure-north-d.cloudapp.net;dbname=db1510646_gameshare";
$username = "b52b6c6935c6d2";
$password = "26ebeed0";

        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "SELECT email FROM members WHERE studentID = '1510646'";




        $results = $conn->query($sql);

        if ($results->rowcount() == 0) {
                echo "no games added <br />";
        }
         else {
foreach ($results as $row) {


        echo $row["email"];}

                $user = '1510646@rgu.ac.uk';

                require_once 'Swiftmailer/lib/swift_required.php';

                $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                    ->setUsername('gameshareteamrgu@gmail.com')
                    ->setPassword('gameshare2016');

                $mailer = Swift_Mailer::newInstance($transport);
                $message = Swift_Message::newInstance('Borrow Request')
                    ->setFrom(array('gameshareteamrgu@gmail.com' => 'GameShare Team'))
                    ->setTo(array($user => 'Dear Valued Member'))
                    ->setBody('You Have Recieved A Borrow Request @Gameshare. Please check your member portal to see the details, and if you are happy to proceed contact them at ' . $email . ' to arrange a swap!

    Thank You
    GameShare');
//$attachment = Swift_Attachment::newInstance(file_get_contents('path/logo.png'), 'logo.png');
//$message->attach($attachment);
                $numSent = $mailer->send($message);
             header("Location:memberSite.php");

        }







?>


