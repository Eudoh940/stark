<?php
// Start the session
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>HR Validation!</title>
</head>
<body>
     <?php
            // define variables and set to empty values
            $firstnameErr = $lastnameErr = $phoneErr = $emailErr = $addressErr = $cityErr = $zipErr= $companynameErr = $jobtitleErr = $whyhire = $uploadresumeErr = "";
            $firstname = $lastname = $phone = $email = $address = $city = $zip = $companyname = $jobtitle = $whyhire = $uploadresume = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["firstname"])) {
                $firstnameErr = "first Name is required";
              } else {
                $firstname = test_input($_POST["firstname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                  $firstnameErr = "Only letters and white space allowed";
                }
              }

              //for last name
               if (empty($_POST["lastname"])) {
                $lastnameErr = "last Name is required";
              } else {
                $lastname = test_input($_POST["lastname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                  $lastnameErr = "Only letters and white space allowed";
                }
              }

              // for phone number
               if (empty($_POST["phone"])) {
                $phoneErr = "phone number is required";
              } else {
                $phone = test_input($_POST["phone"]);
                // check if name only contains letters and whitespace
              }

              // Email
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                }
              }

              // Address
               if (empty($_POST["address"])) {
                $addressErr = "Email is required";
              } else {
                $address = test_input($_POST["address"]);
              }

              //  city
                if (empty($_POST["city"])) {
                $cityErr = "last Name is required";
              } else {
                $city = test_input($_POST["city"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                  $cityErr = "Only letters and white space allowed";
                }
              }
               if (empty($_POST["state"])) {
                $stateErr = "field is required";
              } else {
                $state = test_input($_POST["state"]);
              }

                if (empty($_POST["zip"])) {
                $zipErr = "field is required";
              } else {
                $zip= test_input($_POST["zip"]);
              }

               if (empty($_POST["companyname"])) {
                $companynameErr = "field is required";
              } else {
                $companyname = test_input($_POST["companyname"]);
              }
               if (empty($_POST["jobtitle"])) {
                $jobtitleErr = "field is required";
              } else {
                $jobtitle = test_input($_POST["jobtitle"]);
              } 
             
            // whyhire
              if (empty($_POST["whyhire"])) {
                $whyhire = "";
              } else {
                $whyhire = test_input($_POST["whyhire"]);
              }

               if (empty($_POST["uploadresume"])) {
                $uploadresumeErr = "resume is required";
              } else {
                $uploadresume = test_input($_POST["uploadresume"]);
              }
            }
            
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            ?> 
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#"><h1>Validation Limited</h1></a>
            </li>
        </ul>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                <span class="error"><?php echo $firstnameErr;?></span>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                <span class="error">* <?php echo $lastnameErr;?></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone number" required>
                <span class="error">* <?php echo $phoneErr;?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="name@example.com" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name= "address" placeholder="1234 Main St" required>
                <span class="error">* <?php echo $addressErr;?></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="state">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="zip">
                </div>
            </div>
            <h2>Work Experience</h2>
            <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control"  name="companyname">
            </div>
            <div class="form-group">
                <label for="jobtitle">Job Title</label>
                <input type="text" class="form-control" name="jobtitle">
            </div>
            <div class="form-group">
                <label for="whyhire">Why should we hire you?</label>
                <textarea class="form-control" rows="3"name="whyhire"></textarea>
            </div>
            <div class="form-group">
                <label for="uploadresume">Upload Resume</label>
                <input type="file" class="form-control-file" name="uploadresume">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script src="script.js"></script> 
    
<div class="container">
<?php
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $phone;
echo"<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
echo "<br>";
// echo $state;
// echo "<br>";
echo $zip;
echo "<br>";
echo $companyname;
echo "<br>";
echo $jobtitle;
echo "<br>";
echo $whyhire;
echo "<br>";
echo $uploadresume;
echo "<br>";
?>
</div>
    
</body>

</html>

