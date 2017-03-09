<?php
/*

This is the file that is included into the CTA to do some small validation and check fields have been submitted.

Once this has been done it sends on the data to the mailer.php to handle the data.

*/

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

if(isset($_POST['submit'])){
  // Checks to see if a bot has filled in the honeypot
  if(empty($_POST['honeypot'])){

    $frmName = $_POST['frmname'];

        if($frmName == 'formOne'){

          if (empty($_POST['name']))
              $errors['name'] = 'Name is required.';

          if (empty($_POST['email']))
              $errors['email'] = 'Email is required.';

          if (empty($_FILES['brief']))
              $errors['upload'] = 'Uploaded Brief is required.';

          if ($_FILES['brief']['size'] > $_POST['MAX_FILE_SIZE'] )
              $errors['size'] = 'File too large.';


        } elseif($frmName == 'formTwo'){

        } elseif($frmName == 'formThree'){

        } else {

          die("Something went wrong if you're here!")

        }





// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

        // NOTE: RUN THE MAILER!!

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);


  } else {
    die("No Bots!");
  }
} else {
  die("Well this is awkward....");
}





 ?>
