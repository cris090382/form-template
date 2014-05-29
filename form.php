<?php
include "top.php";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// Initialize variables

// SECTION: 1a.
// 
// variables for the classroom purposes to help find errors.

$debug = false;

if(isset($_GET["debug"])){ // ONLY do this in a classroom environment
    $debug = true;  
}

if ($debug) print "<p>DEBUG MODE IS ON</p>";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b. 

 



//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c. 
// 
// Initialize variables one for each form element
// in the order they appear on the form

$email = "you@uvm.edu";


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d. 
 








//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  
// SECTION: 2a.





    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a.  
     
    
    


   

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b. 
     
    

    
    


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c. 
    
     



    






    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d. 
    
     





    
    




    











    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2e. 
     
      
     
     

   
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f. 
        
        

    

        
        
        
        
        
        
        
        
        
        
        
 
     
        
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g. 
         
        
        

        
















        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2h. 
        // 
        
        
        
















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




























//####################################
//
// SECTION 3c.
 













//####################################
//
// SECTION 3d.
 


















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
                
            
            
            
            
            
            
            <label for="txtEmail" class="required">Email
                <input type="text" id="txtEmail" name="txtEmail" 
                       value="<?php print $email; ?>"
                       tabindex="120" maxlength="45" placeholder="Enter a valid email address"
                       
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


print "</article>";
include "footer.php"; 

?>
</body>
</html>