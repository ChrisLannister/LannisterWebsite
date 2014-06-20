<?php// Chris Lannister's somewhat able php form. 2014 The Hireman. // * * * * * * * *Get all the vars * * * * * * *$name = filter_input(INPUT_POST, 'companyName', FILTER_SANITIZE_SPECIAL_CHARS); $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_SPECIAL_CHARS);$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);$email_from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);$invNo = $_POST['invNo'];$queryType = $_POST['typeOfQueryDropDownBox'];$hireDate = $_POST['hire-date'];$details = $_POST['details'];$generalDetails = filter_input(INPUT_POST, 'generalDetails', FILTER_SANITIZE_SPECIAL_CHARS);$hireRatesCB = filter_input(INPUT_POST, 'hireRatesCB', FILTER_SANITIZE_SPECIAL_CHARS);$salesmanVistCB = filter_input(INPUT_POST, 'salesmanVistCB', FILTER_SANITIZE_SPECIAL_CHARS);// HTML open tags$email_message = '<html><body style="">';	// Your Details Section - Company Name, Contact, Phone Number and Email table building bit here.
$email_message .= '<img src="http://lannister.info/hireman/img/44.png" alt="Query" >';$email_message .= '<h2>Your Details</h2>';
$email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$email_message .= "<tr style='background: #eee;'><td><strong>Company:</strong> </td><td>" . $name . "</td></tr>";
$email_message .= "<tr><td><strong>Contact:</strong> </td><td>" . $contact . "</td></tr>";
$email_message .= "<tr style='background: #eee;'><td><strong>Phone:</strong> </td><td>". $phone ."</td></tr>";
$email_message .= "<tr><td><strong>Email:</strong> </td><td>" . $email_from . "</td></tr>";
$email_message .= "</table>";// Invoice Query Section - Invoice No, Type and Details$email_message .= '<br>';$email_message .= '<h2>Invoice Queries</h2>';		for($i = 0, $l = count($invNo); $i < $l; $i++){
$email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$email_message .= "<tr style='background: #eee;'><td><strong>Invoice/Contract:</strong> </td><td>" . ($invNo[$i]) . "</td></tr>";
$email_message .= "<tr><td><strong>Type of Query:</strong> </td><td>" . ($queryType[$i]) . "</td></tr>";
$email_message .= "<tr><td><strong>Details:</strong> </td><td>" . ($details[$i]) . "</td></tr>";
$email_message .= "</table>";    $email_message .= '<br>';} //Because we can have multiple enquires, we need loop for the amount in the array.  // General Query Section - Deatils, Hire Rates and Supply Catalogues	$email_message .= '<br>';	$email_message .= '<h2>General Query</h2>';    $email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $email_message .= "<tr style='background: #eee;'><td><strong>Details:</strong> </td><td>" . $generalDetails . "</td></tr>";   
    $email_message .= "<tr><td><strong>I need:</strong> </td><td>" . $hireRatesCB . "</td></tr>";  
    $email_message .= "<tr><td><strong></strong> </td><td>" . $salesmanVistCB . "</td></tr>";
    $email_message .= "</table>";     // HTML close tags   $email_message .= "</body></html>";                   // -------------------------------------------------------------------------------------------   // Change this variable to change the destination of the e-mail.   // $email_to = "chris.lannister@thehireman.co.uk";   $email_to = "accounts@thehireman.co.uk";    $email_subject = "Query Form - " . $name . ", has been filled in.";
// Other possible header content//   $headers = "From: " . $email_from . "\r\n";
 //  $headers .= "Reply-To: ". $email_from . "\r\n";
   $headers .= "CC: david.porter@thehireman.co.uk, chris.lannister@thehireman.co.uk\r\n";              
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";    // Mail Push'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();mail($email_to, $email_subject, $email_message, $headers);  // Unused code//	$email_message .= '<div style="width:320px; padding:10px; margin: 0 auto; ">';
//	$email_message .= '<img src="http://lannister.info/hireman/img/44.png" style="float:left;"><h1 style="float:left; margin: 20px 0 0px 40px; font-family:cabinRegular, sans-serif;">Query Form</h1> </div><div style="clear:both; margin:0 0 40px 0"></div>';
//	$email_message .= '';
//	$email_message .= '<h1 style="float:left;">Customer Details</h1>';

//$email_message .= '<ul>';
//$email_message .= '<li>Company Name:         '.($name).'</li>';
//$email_message .= '<li>Contact:                          '.($contact).'</li>';
// $email_message .= '<li>Phone:                            '.($phone).'</li>';
//  $email_message .= '<li>Email:                               '.($email_from).'</li>';
//  $email_message .//   for($i = 0, $l = count($invNo); $i < $l; $i++){

// $email_message .= "Invoice No/Contract No:   " . ($invNo[$i]) . "\n";
// $email_message .= "Type of Query:                      " . ($queryType[$i]) . "\n";
// $email_message .= "Details: \n" . ($details[$i]) . "\n\n\n";
//} //Because we can have multiple enquires, we need loop for the amount in the array.
      
?><!DOCTYPE html><html lang="en"><head>  <meta charset="utf-8">  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  <title>Hireman Query Form</title>  <meta name="description" content="Query Form, Typically Account Invoice Requests">  <meta name="author" content="Chris Lannister">  <meta name="viewport" content="width=device-width; initial-scale=1.0">  <!-- Scripts -->  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  <script src="script.js"></script>  <!-- Stylesheets -->  <link rel="stylesheet" type="text/css" href="css/styles.css"> </head><body><div class="wrapper"> <!-- Confirmation message -->  <p style="text-align:center;"> Thank you for contacting us. We will be in touch with you very soon.<br><br></p>  <img src="" style="margin:30px 0 0 100px; ">   <h5>Useful Links</h5>   <ul>   <li class="confirm"><a href="http://www.lannister.info/hireman/query.html">Submit another form</a></li>     <li class="confirm"><a href="http://www.thehireman.co.uk/">Website</a></li>     <li class="confirm"><a href="http://www.myhireman.com/">My Hireman</a></li>     <li class="confirm"><a href="http://www.thehireman.co.uk/contact-us/depots">Depots Contact Numbers</a></li>   </ul>   </div> <!-- End of wrapper --></body></html>