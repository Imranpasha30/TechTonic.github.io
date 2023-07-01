<?php
// Retrieve form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$address = $_POST['address'];
$service = $_POST['where'];

// Process the form data
// ...

// Generate the HTML response
$htmlResponse = '
<!DOCTYPE html>
<html>
<head>
    <title>Response</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Your form submission has been received.</p>
    <p>First Name: ' . $fname . '</p>
    <p>Last Name: ' . $lname . '</p>
    <p>Email: ' . $email . '</p>
    <p>Phone: ' . $phone . '</p>
    <p>City: ' . $city . '</p>
    <p>State: ' . $state . '</p>
    <p>Pin Code: ' . $pincode . '</p>
    <p>Address: ' . $address . '</p>
    <p>Service: ' . $service . '</p>
</body>
</html>';

// Set the content type as HTML
header('Content-Type: text/html');

// Send the HTML response
echo $htmlResponse;
?>
