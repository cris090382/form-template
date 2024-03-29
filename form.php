<?php
include "top.php";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// Initialize variables
// SECTION: 1a.
// 
// variables for the classroom purposes to help find errors.

$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b. 
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c. 
// 
// Initialize variables one for each form element
// in the order they appear on the form
$firstName = "";
$email = "youremail@uvm.edu";


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d. 
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$firstNameERROR = false;
$emailERROR = false;

// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// array used to hold form values that will be written to a CSV file
$dataRecord = array();

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  
// SECTION: 2a.
//
// Process for when the form is submitted
if (isset($_POST["btnSubmit"])) {



    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a.  
    //
    // do a little security checking
    if (!securityCheck(true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b. 
    //
    // moved to section 1d
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c. 
    //
    // Sanitize (clean) data by removing any potential JavaScript or html code
    // from users input on the form.

    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;


    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d. 
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1d. The if blocks should also be in the order
    // that the elements appear on your form so that the error messages will
    // be in the order they appear. errorMsg will be displayed on the form see
    // section 3c. The error flag ($emailERROR) will be used in section 3d.

    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have extra character.";
        $firstNameERROR = true;
    }

    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2e. 
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f. 
        //
        // build a message to display on the screen in section xx and to mail
        // to (section 2h. the person filling out the form

        $message = '<h2>Your information.</h2>';

        foreach ($_POST as $key => $value) {

            $message .= "<p>";

            $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

            foreach ($camelCase as $one) {
                $message .= $one . " ";
            }
            $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
        }


        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g. 
        //
        // This block saves the data to a CSV file. Be sure to create the file
        // manually first and set the permissions to 666 ( -rw-rw-rw )

        $fileExt = ".csv";

        $myFileName = "data/registration";

        $filename = $myFileName . $fileExt;

        if ($debug)
            print "\n\n<p>filename is " . $filename;

        // now we just open the file for append
        $file = fopen($filename, 'a');

        // write the forms informations
        fputcsv($file, $dataRecord);

        // close the file
        fclose($file);

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2h. 
        // 
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $cc = "";
        $bcc = "";
        $from = "WRONG site <noreply@yoursite.com>";

        // I wanted to use the date in my message
        $todaysDate = strftime("%x");

        /* subject line for the email message */
        $subject = "Web Order: " . $todaysDate;

        $mailed = sendMail($email, $cc, $bcc, $from, $subject, $message);
    } // end form is valid
} // ends if form was submitted. We will be adding more information ABOVE this
//#############################################################################
//
// SECTION 3a.
//
// Start the article tag to hold the form
?>

<article id="main">

<?php
//####################################
//
// SECTION 3b.
//
// If the form was submitted and there are no errors we will display the
// message that was mailed.
// If its the first time coming to the form or there are errors we are going
// to display the form.
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
    print "<h1>Your Request has ";

    if (!$mailed) {
        print "not ";
    }

    print "been processed</h1>";

    print "<p>A copy of this message has ";
    if (!$mailed) {
        print "not ";
    }
    print "been sent</p>";
    print "<p>To: " . $email . "</p>";
    print "<p>Mail Message:</p>";

    print $message;
} else {


//####################################
//
// SECTION 3c.
//
// display any error messages before we print out the form

    if ($errorMsg) {
        print '<div id="errors">';
        print "<ol>\n";
        foreach ($errorMsg as $err) {
            print "<li>" . $err . "</li>\n";
        }
        print "</ol>\n";
        print '</div>';
    }


//####################################
//
// SECTION 3d.
//
    /* Display the HTML form. note that the action is to this same page. $phpSelf
      is defined in top.php
      NOTE the line:

      value="<?php print $email; ?>

      this makes the form sticky by displaying either the initial default value (line 34)
      or the value they typed in (line 90)

      NOTE this line:

      <?php if($emailERROR) print 'class="mistake"'; ?>

      this prints out a css class so that we can highlight the background etc. to
      make it stand out that a mistake happened here.

     */
    ?>

        <form action="<?php print $phpSelf; ?>" 
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">
                <legend>Register Today</legend>
                <p>Please fill out the following registration form. <span class='required'></span>.</p>

                <fieldset class="wrapperTwo">
                    <legend>Please complete the following form</legend>

                    <fieldset class="contact"> 
                        <legend>Contact Information</legend>
                        <label for="txtFirstName" class="required">First Name
                            <input type="text" id="txtFirstName" name="txtFirstName"
                                   value="<?php print $firstName; ?>"
                                   tabindex="100" maxlength="45" placeholder="Enter your first name"
                                   <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   autofocus>
                        </label>
                        <label for="txtEmail" class="required">Email
                            <input type="text" id="txtEmail" name="txtEmail" 
                                   value="<?php print $email; ?>"
                                   tabindex="120" maxlength="45" placeholder="Enter a valid email address"
                                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" >
                        </label>
                    </fieldset>   <!-- ends contact -->				
                </fieldset> <!-- ends wrapper Two -->
                <fieldset class="buttons">
                    <legend></legend>				
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
                </fieldset> <!-- ends buttons -->
            </fieldset> <!-- Ends Wrapper -->
        </form>

    <?php
} // end body submit

print "</article>";
include "footer.php";
?>
</body>
</html>