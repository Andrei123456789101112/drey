<?php
$fullname = $email = $password = $cpassword = "";
$fullnameErr = $emailErr = $passwordErr = $cpasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fullname"])) {
        $fullnameErr = "Fullname is required";
    } else {
        $fullname = ($_POST["fullname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = ($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = ($_POST["password"]);
    }

    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpassword = ($_POST["cpassword"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .registration-container {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
            margin-top: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        .form-group input[type="submit"] {
            background-color: black;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: white;
        }
        .form-links {
            margin-top: 10px;
        }
        .form-links a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="registration-container">
    <h2><b>Register</h2></b>
    <form method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>"><br>
            <span class="error" style='color: red;'><?php echo $fullnameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
            <span class="error" style='color: red;'><?php echo $emailErr; ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br>
            <span class="error" style='color: red;'><?php echo $passwordErr; ?></span>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword" value="<?php echo $cpassword; ?>"><br>
            <span class="error" style='color: red;'><?php echo $cpasswordErr; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary">
        </div>
    </form>
    <div class="form-links">
        <a href="index.php" class="btn btn-link">Already have an account? Login</a>
    </div>
</div>

<?php if ($loginSuccess): ?>
    <div class="alert alert-success" role="alert">
        Congratulations! You have successfully logged in.
    </div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>