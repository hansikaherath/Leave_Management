<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {
            background-image: url(Blue-abstract-background-curve_1920x1080.jpg);
            margin-top: 50px;
        }

        .error {
            color: #FF0000;

        }

        .centerall {
            float: left;
            margin-left: 500px;
        }

        #head {
            color: darkblue;
            align-items: center;
            font-size: 35px;
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $mobileErr = "";
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["mobile"])) {
            $mobile = "";
        } else {
            $mobile = test_input($_POST["mobile"]);
            // check vaild mobile number
            if (!preg_match("/^[0-9]{10}+$/", $website)) {
                $mobileErr = "Invalid number";
            }
        }



        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2 id="head">Leave Management System</h2>
    <div class="centerall">
        <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Emp_no:<input type="number" name="emp_no" value="<?php echo $empno; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>
            Name: <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
            <br><br>
            E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
            <br><br>
            Mobile Number: <input type="tel" name="website" value="<?php echo $mobile; ?>">
            <span class="error"><?php echo $mobileErr; ?></span>
            <br><br>

            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
            <span class="error">* <?php echo $genderErr; ?></span>
            <br><br>
            Department:
            Designation:
            Leave_commencing_date:
            Duty_reputing_date:
            Leave_type:
            Reason_to_leave:
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
    //  echo "<h2>Your Input:</h2>";
    //   echo $name;
    #  echo "<br>";
    //   echo $email;
    //  echo "<br>";
    // echo $website;
    //    echo "<br>";
    //  echo $comment;
    //  echo "<br>";
    //  echo $gender;
    ?>

</body>

</html>