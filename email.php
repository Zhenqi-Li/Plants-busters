<?php
	$username = $_POST['uname']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comment']; // required
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$username)) {
    $error_message .= 'The username you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The comments/questions you entered do not appear to be valid.<br />';
  }
  
    $email_body = "You have received a question/comment from the user $username.\n".
					"Here is the question/comment:\n $comments".
	$to = "ruth.fernandes@colorado.edu"
	@mail($to, $email_from, $email_body);  
	
	
	
?>