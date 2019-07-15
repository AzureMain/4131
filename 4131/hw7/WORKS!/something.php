<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
lang="en">

<!DOCTYPE HTML>
<html>
  <head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="ss.css">
    <script src="ts.js"></script>
  </head>
  <body>
    <?php
    // define variables and set to empty values
    $firstnameErr = $lastnameErr = $addErr = $stateErr = $cityErr = $zipErr = "";
    $firstname = $lastname = $add1 = $add2 = $city = $state = $zip = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["firstname"])) {
        $firstnameErr = "First name is required";
      } else {
        $firstname = test_input($_POST["firstname"]);
        // check if name only contains letters
        if (!preg_match("/^[a-zA-Z]+$/",$firstname)) {
          $firstnameErr = "Only letters allowed";
        }
      }

      if (empty($_POST["lastname"])) {
        $lastnameErr = "Last name is required";
      } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z]+$/",$lastname)) {
          $lastnameErr = "Only letters allowed";
        }
      }

      if (empty($_POST["add1"])) {
        $addErr = "address is required";
      } else {
        $add1 = test_input($_POST["add1"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$add1)) {
          $addErr = "Only letters, Number and white space allowed";
        }
      }

      if (empty($_POST["city"])) {
        $cityErr = "City is required";
      } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
          $cityErr = "Only letters and white space allowed";
        }
      }


      if (empty($_POST["state"])) {
        $stateErr = "State is required";
      } else {
        $state = test_input($_POST["state"]);
        if (!preg_match("/^[a-zA-Z]+$/",$state)) {
          $stateErr = "Only letters allowed";
        }
      }
      if (empty($_POST["zip"])) {
        $zipErr = "State is required";
      } else {
        $zip = test_input($_POST["zip"]);
        if (!preg_match("/^[0-9]*$/",$zip)) {
          $zipErr = "Only numbers allowed";
        }
      }


      if (empty($_POST["add2"])) {
        $add2 = "";
      } else {
        $add2 = test_input($_POST["comment"]);
      }

    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <h2>Homework 8</h2>
    <p><span class="error">* required field.</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      First Name: <input type="text" name="firstname" value="<?php echo $firstname;?>">
      <span class="error">* <?php echo $firstnameErr;?></span>
      <br><br>
      Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
      <span class="error">* <?php echo $lastnameErr;?></span>
      <br><br>
      Address Line 1: <input type="text" name="add1" value="<?php echo $add1;?>">
      <span class="error">* <?php echo $addErr;?></span>
      <br><br>
      Address Line 2: <input type="text" name="add2" value="<?php echo $add2;?>">
      <br><br>
      City: <input type="text" name="city" value="<?php echo $city;?>">
      <span class="error">*<?php echo $cityErr;?></span>
      <br><br>
      State: <input type="text" name="state" value="<?php echo $state;?>">
      <span class="error">*<?php echo $stateErr;?></span>
      <br><br>
      Zip Code: <input type="text" name="zip" value="<?php echo $zip;?>">
      <span class="error">*<?php echo $zipErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit" onclick="loadXMLDoc()">
    </form>

    <?php
    // Process the form post entries

    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $add1 = $_REQUEST["add1"];
    $add2 = $_REQUEST["add1"];
    $city = $_REQUEST["city"];
    $state = $_REQUEST["state"];
    $zip = $_REQUEST["zip"];

    // create a JSON response of the form submitted data
    if (count($_REQUEST) > 0) {
    	$JSONResponse = "{<br>";
    	$JSONResponse = $JSONResponse . "\tFirst Name: \"$firstname\"<br>";
    	$JSONResponse = $JSONResponse . "\tLast Name: \"$lastname\"<br>";
      $JSONResponse = $JSONResponse . "\tAddress line 1: \"$add1\"<br>";
      $JSONResponse = $JSONResponse . "\tAddress line 2: \"$add2\"<br>";
      $JSONResponse = $JSONResponse . "\tCity: \"$city\"<br>";
      $JSONResponse = $JSONResponse . "\tState: \"$state\"<br>";
      $JSONResponse = $JSONResponse . "\tZip: \"$zip\"<br>";
    	$JSONResponse = $JSONResponse . "}<br>";
    }

    // Output the result if the form was submitted
    echo $JSONResponse === "" ? "" : $JSONResponse;
    ?>
  </body>
</html>
