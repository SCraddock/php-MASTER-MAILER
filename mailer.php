<?php

/*

I need 2 parts to the script

the first part will be embeded on the page so it send the data to itself
there it will do some validation checks making sure everything is filled in or is in the correct format (ajax)

Then once all that is done it is sent onto this page where it does a load of heavy validating and sanitising to then send out the data









[_1_] Validation
[_2_] Sanitisation Functions
[_3_] General Security (Honeypot And Checking It Has Been Submitted)
[_4_] formOne Content Functionality
[_5_] formTwo Content Functionality
[_6_] formThree Content Functionality
[_7_] Compiling The Data(array) Into An Email
[_8_] Sending The Email
[_9_] Error Handling
[_10_] Any Odd Bits
[_11_] PHP Function glossary


*/

// [_1_] Validation ============================================================
// Determine if our data is the correct form e.g. to check $x a number

function validateEmail($email){
  $email = trim($email);
  if(filter_var($email, FILTER_VALIDATE_EMAIL) == true ){
    return true;
  } else {
    die("This is not a valid email");
  }
};

function validateNumber($number){
  $number = trim($number);
  if(is_numeric($number) == true){
    return true;
  } else {
    die($number . "is not a number!");
  }
};

function validateDate($date){
  $date = trim($date);
  if (!DateTime::createFromFormat('d/m/Y', $date)){
    return true;
  } else {
    die("I don't talk to strangers");
  }
};

function validateUrl($url){
  $url = trim($url);
  if(filter_var($url, FILTER_VALIDATE_URL) == true ){
    return true;
  } else {
    die("This is not a valid email");
  }
};

// [_2_] Sanitise Functions ====================================================
 // Cleans out strings, removing illegal characters
 function sanitiseString($dirty){
   $dirty = trim($dirty);
   $dirty = mysqli_real_escape_string($dirty);
   $dirty = filter_var($dirty, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $clean = filter_var($dirty, FILTER_SANITIZE_STRING);
   return $clean;
 }
 // sanitises email address
 function sanitiseEmail($dirty){
   $dirty = trim($dirty);
   $dirty = mysqli_real_escape_string($dirty);
   $clean = filter_var($dirty, FILTER_SANITIZE_EMAIL);
   return $clean;
 };
 // sanitises an interger
 function sanitiseNumber($dirty){
   $dirty = trim($dirty);
   $dirty = mysqli_real_escape_string($dirty);
   $clean = filter_var($dirty, FILTER_SANITIZE_NUMBER_INT);
   return $clean;
 };
 // sanitises url
 function sanitiseURL($dirty){
   $dirty = trim($dirty);
   $dirty = mysqli_real_escape_string($dirty);
   $clean = filter_var($dirty, FILTER_SANITIZE_URL);
   return $clean;
 }
// [_3_] General security ======================================================
// Simple things like checking it has been submitted and the honeypot trap

// This checks to see if the submit button has been clicked
if(isset($_POST['submit'])){
  // Checks to see if a bot has filled in the honeypot
  if(empty($_POST['honeypot'])){

    $frmName = $_POST['frmname'];

    if($frmName == 'formOne'){
// [_4_] formOne ====================================================
// All the data handling for formOne

// Variables

    // check to see if the file was uploaded via HTTP POST to check the script hasnt been tricked into working on files it shouldn't be
    if (is_uploaded_file($_FILES['brief']['tmp_name']) == false) {
      die("I only work on uploaded files!");
    }

    $brief = $_FILES['brief']; // gets array of data for the file
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $error = $_FILES['brief']['error'] // gets error code (if any)

    /*

    UPLOAD_ERR_OK
    Value: 0; There is no error, the file uploaded with success.

    UPLOAD_ERR_INI_SIZE
    Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.

    UPLOAD_ERR_FORM_SIZE
    Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.

    UPLOAD_ERR_PARTIAL
    Value: 3; The uploaded file was only partially uploaded.

    UPLOAD_ERR_NO_FILE
    Value: 4; No file was uploaded.

    UPLOAD_ERR_NO_TMP_DIR
    Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.

    UPLOAD_ERR_CANT_WRITE
    Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.

    UPLOAD_ERR_EXTENSION
    Value: 8; A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0.

    */

    sanitiseString($name);
    sanitiseEmail($email);
    sanitiseNumber($phone);



// end of formOne [_4_]
    } elseif($frmName == 'formTwo'){
// [_5_] formTwo ====================================================
// All the data handling for formTwo







// end of formTwo [_5_]
    } elseif($frmName == 'formThree') {
// [_6_] formThree ====================================================
// All the data handling for formThree





// end of formThree [_6_]
    } else {
    die("Something went wrong if you're here");
    }

  } else {
    die("No bots!");
  }

} else {
  die("Well this is awkward....");
}

// [_11_] PHP Functions Glossary  ========================================================
// This is a list of the PHP functions used and the coresponding manual link [http://php.net/manual/en/]
/*

Function : trim()
Link : http://php.net/manual/en/function.trim.php

Function : filter_var()
Link : http://php.net/manual/en/function.filter-var.php
Link to filters : http://php.net/manual/en/filter.filters.php

Function : is_numeric()
Link : http://php.net/manual/en/function.is-numeric.php

Function : mysqli_real_escape_string()
Link : http://php.net/manual/en/mysqli.real-escape-string.php

Function : isset()
Link : http://php.net/manual/en/function.isset.php

Function : empty()
Link : http://php.net/manual/en/function.empty.php

Function : echo()
Link : http://php.net/manual/en/function.echo.php

Function is_uploaded_file()
Link : http://php.net/manual/en/function.is-uploaded-file.php






*/
 ?>
