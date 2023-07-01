<?php
$msg = '';
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



if(isset($_POST['submit'])){
    // Retrieve form data
    $user = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pass = $_POST['password'];

    include('config.php');
    // Check if the email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($checkResult) > 0){
        $msg = 'Email already exists';
        echo '<script>alert("' . $msg . '");</script>';
    } else {
        // Generate a unique token for email verification
        $token = mysqli_real_escape_string($conn,md5(uniqid()));

        // Insert the user data into the database along with the token
        $query = "INSERT INTO users (username, email, number, password, token, is_verified) VALUES ('$user', '$email', '$number', '$pass', '$token', 0)";
        $result = mysqli_query($conn, $query);

        if($result){//Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'techtonic428@gmail.com';                     //SMTP username
                $mail->Password   = 'ehqhgidxybtdeyzj';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('techtonic428@gmail.com');
                $mail->addAddress($email);     //Add a recipient
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'no reply';
                $mail->Body    = 'Here is the verification link <b><a href="http://localhost/seminar/web%20software%20assignment/?verification='.$token.'">http://localhost/seminar/web%20software%20assignment/?verifiaction='.$token.'</a></b>';
                
            
                $mail->send();
                echo '<script>alert("Message has been sent");</script>';
             
            } catch (Exception $e) {
                
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
            echo '<script>alert("we have sent a verification link on your email address");</script>';

        } else {
            $msg = 'Registration failed';
        }
        } 
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registor.css">
    <title>sign up</title>
    -
    
</head>
<body>
    <div class="contain">
        <span class="border-line"></span>
        <?php echo $msg ?>
        <form action=""method="post">
            <h2>SIGN-UP</h2>
            <div class="input">
                <input type="text" class="username" name="username"  required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="input">
                <input type="email" class="email" name="email" required="required">
                <span>Email-id</span>
                <i></i>
            </div>
            <div class="input">
                <input type="number" class="number" name="number" required="required">
                <span>Phone number</span>
                <i></i>
            </div>
            <div class="input">
                <input type="password" class="password" name="password" required="required">
                <span>password</span>
                <i></i>
            </div>
            <div class="links">
                <p>Do you have account?</p>
                <a href="login.php">Sign in</a>
            </div>
            
             <input type="submit" name='submit' value="Submit">
        </form>
    </div>
</body>
</html>


