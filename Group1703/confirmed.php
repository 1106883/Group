<?session_start();
if(!isset($_SESSION['username'])){
    header("Location:home.php");
}

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT gameCollection.Title, owns.copyID, member.firstName, member.lastName, member.email
            FROM gameCollection INNER JOIN owns ON owns.GameID = gameCollection.gameID INNER JOIN member ON owns.studentID = member.memberID";

    $result = $conn->exec($sql);
    foreach ($results as $row) {
        $title = $row['Title'];
        $id = $row['copyID'];
        $first = $row['firstName'];
        $lastname = $row['lastName'];
        $email = $row['email'];


//email to volunteer function
        //function request_game()
        //{

            $name = $firstName . " " . $lastname;

            //email subject
            $subject = 'You have received a borrow request';


            //email body in html
            //Put your own text in here, with html tags like <br> or whatever you want
            $txt = 'Hi '.$name.', <br>You have received a request to borrow one of your games. Please see the details below.
                <table>
                    <th>Title</th><th>Copy ID</th><th>BorrowerID</th>
                    <td>'.$title = $row["Title"].'</td>
                    <td>'.$id = $row["copyID"].'</td>
                    <td>'.$_SESSION['username'].'</td>
                </table>
                <br>Please contact the user using there RGU email which is: '.$_SESSION['username'].'@rgu.ac.uk.
                <br>Regards,<br>   GameShare

              ';



            //take in the necessary swiftmailer code
            require_once 'swiftmailer/lib/swift_required.php';

            //this is all swiftmailer magic, using the gmail smtp server of my account...
            $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                ->setUsername('gamesharergu@gmail.com')
                ->setPassword('GamesharegroupC');

            //Creates an instance of the mailer
            $mailer = Swift_Mailer::newInstance($transporter);

            //the message supplies some more detailed info
            $message = Swift_Message::newInstance('You have received a borrow request')
                ->setFrom(array('Gamesharergu@gmail.com' => 'Webmaster@GameShare'))//shows my name when email arrives
                ->setTo(array($email => $name))//shows volunteer name as linked to their email address
                ->setBody($txt, "text/html");  //tells swiftmailer that we're using html text

            //Finally the mail is sent
            $result = $mailer->send($message);

        //}
    }

} catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();


}

?>