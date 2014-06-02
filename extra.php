<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Extra example source code</p>
        <?php
$comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");
?>

<fieldset  class="textarea">					
    <label for="txtComments" class="required">Comments</label>
    <textarea id="txtComments" 
              name="txtComments" 
              tabindex="200"
    <?php if ($emailERROR) print 'class="mistake"'; ?>
              onfocus="this.select()" 
              style="width: 25em; height: 4em;" ><?php print $comments; ?></textarea>
</fieldset>

<?php
$gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
?>
<fieldset class="radio">
    <legend>What is your gender?</legend>
    <label><input type="radio" 
                  id="radGenderMale" 
                  name="radGender" 
                  value="Male"
<?php if ($gender == "Male") print 'checked="checked"' ?>
                  tabindex="330">Male</label>
    <label><input type="radio" 
                  id="radGenderFemale" 
                  name="radGender" 
                  value="Female"
<?php if ($gender == "Female") print 'checked="checked"' ?>
                  tabindex="340">Female</label>
</fieldset>

<?php
if (isset($_POST["chkHiking"])) {
    $hiking = true;
} else {
    $hiking = false;
}

if (isset($_POST["chkKayaking"])) {
    $kayaking = true;
} else {
    $kayaking = false;
}
?>

<fieldset class="checkbox">
    <legend>Do you like (check all that apply):</legend>
    <label><input type="checkbox" 
                  id="chkHiking" 
                  name="chkHiking" 
                  value="Hiking"
                  <?php if ($hiking) echo ' checked="checked" '; ?>
                  tabindex="420"> Hiking</label>

    <label><input type="checkbox" 
                  id="chkKayaking" 
                  name="chkKayaking" 
                  value="Kayaking"
                  <?php if ($kayaking) echo ' checked="checked" '; ?>
                  tabindex="430"> Kayaking</label>
</fieldset>

<?php
$mountain = htmlentities($_POST["lstMountains"],ENT_QUOTES,"UTF-8");
?>
<fieldset  class="listbox">	
    <label for="lstMountains">Favorite Mountain</label>
    <select id="lstMountains" 
            name="lstMountains" 
            tabindex="520" >
        <option <?php if($mountain=="HayStack Mountain") print " selected "; ?>
            value="HayStack Mountain">HayStack Mountain</option>
        
        <option <?php if($mountain=="Camels Hump") print " selected "; ?>
            value="Camels Hump" selected="selected">Camels Hump</option>
        
        <option <?php if($mountain=="Laraway Mountain") print " selected "; ?>
            value="Laraway Mountain" >Laraway Mountain</option>
    </select>
</fieldset>
    </body>
</html>