<?php
// Check if form has been submitted.
if (isset($_POST['submitted'])) {
    
$errors = array(); // Initialize error messages.
    
if ($_POST['name'] == 'Name') {
    $errors[] = 'Name?';
} else {
    $name = $_POST['name'];
}

if ($_POST['email'] == 'Email') {
		$errors[] = 'Email?';
	} elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            
        } else {
            $errors[] = 'Email not valid.';
	}
	
if ($_POST['subject'] == 'Subject') {
    $subject = 'None';
} else {
    $subject = $_POST['subject'];
}
	
if ($_POST['message'] == 'Message') {
    $message = 'None';
} else {
    $message = $_POST['message'];
}

if (!empty($_POST['daspam'])) {
	$errors[] = 'What\'s up spammer?';
} // END SPAM CHECK

if (empty($errors)) { // Everything is ok.

// Send an email.
$body = stripslashes("<strong>Name:</strong> {$name}<br><br>
<strong>E-mail:</strong> {$_POST['email']}<br><br>
<strong>Subject:</strong> {$_POST['subject']}<br><br>
<strong>Message:</strong> {$message}");
$headers = "From: {$_POST['email']}\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
mail ('info@themcgareygroup.com', 'McGarey Web Contact', $body, $headers);

	// Start defining the URL.
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	// Check for a trailing slash.
	if ((substr($url, -1) == '/') OR (substr($url, -1) == '\\') ) {
		$url = substr ($url, 0, -1); // Chop off the slash.
	}
	$url .= '/thanks'; // Add the page.
	header("Location: $url");
	exit(); // Quit the script.

} // End of if (empty($errors)) IF.
} // End of main submit.
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>McGarey Management Group real estate professionals</title>
<meta name="Description" content="McGarey Management Group real estate professionals.">
<meta name="keywords" content="real estate professionals, California real estate management, North Carolina real estate analysis, real estate construction oversight, real estate debt and equity capital sourcing">

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	
<link rel="stylesheet" type="text/css" href="css/mcgarey.css" media="all" />
<link rel="stylesheet" href="css/my-slider.css"/>
<link rel="shortcut icon" href="images/mcgarey.ico" type="image/x-icon">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/ism-2.2.min.js"></script>
<script type="text/javascript" src="js/aw-respnav.js" ></script>

</head>

<body>

<?php
include ('navigation.html');
?>

<!-- BIG PIC STARTS HERE -->
<div class="nobigslides">
<div class="subpicont">
      <div class="subpichead">Contact Us</span></div>
      <div class="subpicquote" data-delay='200'>McGarey Management Group. West Coast,<br>
      <span class="subpicquotetwo">East Coast, we've got you covered.</span></div>
</div>
</div>
<!-- BIG PIC ENDS HERE -->

<div class="main fade-in one">
  
<h1>Contact Us</h1>
  
<!-- text block -->
<div class="contblock">
<div class="contbox">
  
<div class="continfo">
  
<?php
if (!empty($errors)) { // Print any error messages.
	echo '<span class="error">Oops!<br>We\'ve got a problem here:</span><br>';
	foreach ($errors as $msg) { // Print each error.
		echo "$msg<br>\n";
	} // end foreach
	echo '<br>';
}
?>
  
<b>West Coast Office</b><br>
<a href="tel:+16195370377">(619) 537-0377</a><br>
PO Box 180729<br>
Coronado, CA 92178<br>
<a href="mailto:info@themcgareygroup.com">info@themcgareygroup.com</a>
<br><br>
<b>East Coast Office</b><br>
<a href="tel:+16072352345">(607) 235-2345</a><br>
PO Box 261<br>
Cooperstown, NY 13326<br>
<a href="mailto:info@themcgareygroup.com">info@themcgareygroup.com</a>
</div>

<div class="context">
Thank you for your interest in McGarey Management Group.
Please complete all fields. Your information will be kept confidential.
<br><br>

<?php

if (isset($_POST['message'])) {
	
$writeit = stripslashes($_POST['message']);

} elseif (!isset($_POST['message'])) {

$writeit = 'Message';

}
?>

<form action="/contact-us" method="post">
<fieldset>
  
<input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : 'Name' ?>" onfocus="if(this.value == 'Name') { this.value = ''; }" onblur="if (this.value == '') { this.value='Name'; }" />

<input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : 'Email' ?>" onfocus="if(this.value == 'Email') { this.value = ''; }" onblur="if (this.value == '') { this.value='Email'; }" />

<input type="text" id="subject" name="subject" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : 'Subject' ?>" onfocus="if(this.value == 'Subject') { this.value = ''; }" onblur="if (this.value == '') { this.value='Subject'; }" />
  
<textarea name="message" onfocus="if(this.value == 'Message') { this.value = ''; }" onblur="if (this.value == '') { this.value='Message'; }"><?php echo isset($_POST['message']) ? $_POST['message'] : 'Message' ?></textarea>

<div style="display:none;visibility:hidden;">
<input type="text" size="20" maxlength="30" name="daspam" class="textform" onFocus="this.className='focused'" onBlur="this.className='default'" onChange="this.className='default'"></div>			

<input type="submit" class="contbutton" value="Send Message" />
<input type="hidden" name="submitted" value="TRUE" />
			
</fieldset>
</form>

</div>

</div>
</div>
<!-- end text block -->

</div> <!--end main-->

<?php
include ('footer.html');
?>

</body>
</html>