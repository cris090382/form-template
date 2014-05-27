<?php
include "top.php";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
 


// SECTION: 1a.
 










//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b. 
 
 



//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c. 
 






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

    <fieldset class="intro">
        <legend>Please complete the following form</legend>

        <fieldset class="contact"> 
            <legend>Contact Information</legend>
                
            
            
            
            
            
            
            <label for="txtEmail" class="required">Email
                <input type="text" id="txtEmail" name="txtEmail" 
                       value=""
                       tabindex="120" maxlength="45" placeholder="Enter a valid email address"
                       
                       onfocus="this.select()" >
                </label>
        </fieldset>					
    </fieldset>
    <fieldset class="buttons">
          <legend></legend>				
          <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
    </fieldset>
</fieldset>
</form>
  
<?php 


print "</article>";
include "footer.php"; 

?>
</body>
</html>