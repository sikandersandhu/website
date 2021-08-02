<!-- Accessing the form submission data in the PHP script -->
<?php
  $first_name = $_POST['input-first-name'];
  $last_name = $_POST['input-last-name'];
  $visitor_email = $_POST['input-email'];
  $visitor_phone = $_POST['input-phone'];
?>
<!-- Composing the email message-->
<?php
  $email_from = 'info.artworksmagic@gmail.com';
  $email_subject = "New Subscription";
  $email_body = "You have received a new subscription from the user $first-name.\n".
                "Here are the detail:"
                "Name: $first_name $last_name"
                "Email: $visitor_email"
                "Phone: $visitor_phone"
?>
<!-- Sending the message -->
<?php
  $to = "sikandersandhu82@gmail.com, sigalit.somech@gmail.com";

  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $visitor_email \r\n";

  mail($to,$first-name,$last_name,$visitor_email,$visitor_phone,$headers);
 ?>
<!-- Securing the form against email injection by spammers -->
<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>