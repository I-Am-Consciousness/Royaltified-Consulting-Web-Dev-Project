<?php

if(isset($_POST['submit'])) {
    $mailto = "skosananeogift@gmail.com";  //My email address | sales@royaltifiedconsulting.co.za
    //getting customer data
    $name = $_POST['name']; //getting customer name
    $surname = $_POST['surnaname']; //getting customer surname
    $phone = $_POST['cell']; //getting customer cell number
    $fromEmail = $_POST['email']; //getting customer email
    $subject = $_POST['service']; //setting subject line to be one of the services selected from the form
    $subject2 = "Confirmation: Message has been recieved successfully | Royaltified (Pty) Ltd."; // For customer confirmation

    //Email body I will receive
    $message = "Hello Sizakele, here's an email from a potential client\n\n"
    . "Cleint Name: " . $name . "\n"
    . "Cleint Surname: " . $surname . "\n"
    . "Phone Number: " . $phone . "\n"
    . "Service Chosen By Client: " . $subject . "\n\n";

    if($_POST['message']) {
        $message = $message . "Message From The Client: " . "\n" . $_POST['message'];
    }
    else {
        $message = $message . "The client did not type any message in the form.";
    }

    //Message for client confirmation
    $message2 = "Dear " . $name . " " . $surname . "\n"
    . "Thank you for choosing our services. You'll recieve a call from us shortly :-)" . "\n\n"
    . "You choose the following service: " . $_POST['service'] . "\n\n"
    . "Regards," . "\n" . "Sizakele Mboshane\nManaging Director\nRoyaltified (Pty) Ltd\nCell: +27 60 846 1812\nEmail: sizakele@royaltifiedconsulting.co.za";

    //Email headers
    $headers = "From: " . $fromEmail; // Client email, I will receive
    $headers2 = "From: " . $mailto; // This will receive client

    //PHP mailer function

    $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
    $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client

    //Checking if Mails sent successfully

    if ($result1 && $result2) {
        $success = "Your Message was sent Successfully!";
    } else {
        $failed = "Sorry! Message was not sent, Try again Later.";
    }

}

?>
