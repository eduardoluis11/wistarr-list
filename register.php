<?php
    // File: register.php
    // This allows the user to sign up.
    /* The only thing that's not working is the "success" flash
    message when the user creates their account, but I think that's
    because I'm redirecting the user to "login.php" right after
    hitting the submit button. I'll try to fix that. FIXED IT.*/

    require_once "pdo.php";
    require "header.php";

    /* This file will be similar to "add.php" */
    /* This will check if all of the sign up form's boxes have been filled out
    when the user clicks "submit". The fields will be "username", "email",
    and "password", and all of them are required. The "I've read the terms and conditions" checkbox should also
    be marked to sign up. IT WORKS, since it only creates an account once you fill out all of the data and check
    the terms of service checkbox. HOWEVER, it doesn't display any error message if you fill all of the blanks
    but leave the terms of service checkbox unchecked. I need to see how is the checkbox value being stored. FIXED.
    I won't check if the checkbox is checked on the initial "if" statement. I will check WITHIN the if statement if the
    checkbox is checked. */
    if ( isset($_POST['username']) && isset($_POST['email'])
        && isset($_POST['password']) )
    {
        /* Data validation. This will check if any of the boxes is empty. */
        /* If the username or password are empty, I will display an error message. Also, this will check if the
        terms checkbox is checked. If it's not checked, an error will appear, and the user won't be able to
        create their account. IT WORKS. That is because, if the checkbox is checked, the string "accepted" is inserted
        within "acceptTerms", so its string length is different than 1. */
        if ( strlen($_POST['username']) < 1 || strlen($_POST['password']) < 1 || strlen($_POST['acceptTerms']) < 1)
        {
            // This is the error message for not typing either the password or
            // the username.
            $_SESSION['error'] = 'Please, fill out all of the fields.';

            // I will redirect the user to this same page (register.php).
            header("Location: register.php");
            return;
        }

        /* This checks if the email has an "@" sign, which is the same as checking
        whether the user inserted an email or not. */
        if( strpos($_POST['email'], '@') === false )
        {
            // I will show an error message if the email doesn't have an "@" sign.
            $_SESSION['error'] = 'Please, insert a valid email.';
            header("Location: register.php");
            return;
        }

        // Everything below this line within this "if" will execute if the above conditions (if the email doesn't have
        // an "@" or if the fields are empty) are false.

        /* This will hash the password typed by the user. IT WORKED.
        However, now I need to unhash the password to login as the user with
        the hashed password. */
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        /* This SQL statement will insert the username, email and password to
        the database. The table is "users". REMEMBER TO ENCRYPT THE PASSWORDS. */
        $sql = "INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':username' => $_POST['username'],
            ':email' => $_POST['email'],
            // The password being inserted here is already hashed.
            ':password' => $_POST['password']
        ));

        // I'll add a success flash message if the user is successfully created.
        $_SESSION['success'] = 'Your account has been created!';

        /* I will redirect the user to the login page (login.php). */
        header('location: login.php');
        return;
    }

    // This puts the error flash message in red, and hides the message after
    // refreshing the page.
    if ( isset($_SESSION['error']) )
    {
        echo '<p style="color:red">' . $_SESSION['error'] . "</p><br>";
        unset($_SESSION['error']);
    }
?>

<!-- Sign up form. The user needs to fill in this data to create their account. -->
<h1>Sign Up</h1>
<p>Create your Account</p>
<form method="post">
    <p>Username:
    <input type="text" name="username"></p>
    <p>Email:
    <input type="text" name="email"></p>
    <p>Password:
    <input type="password" name="password"></p>

    <!-- This checks if you've accepted the terms, the privacy policy, and if you give your consent to give your
    data. -->
    <input type="checkbox" name="acceptTerms" value="accepted">
    <label for="acceptTerms" style="font-size: 14px">
        I’ve read and accepted your <a href="terms_conditions.php" target="_blank">Terms and Conditions</a> and
        your <a href="privacy_policy.php" target="_blank">Privacy Policy</a>. I also consent that you store my personal
        information.
    </label><br>

    <!-- Submit button. -->
    <p><input type="submit" value="Create Account"/>

    <!-- I will send the user back to the "login.php" page if they hit this
    "cancel" button. -->
    <a href="login.php">Cancel</a></p>
</form>

<?php require "footer.php"; ?>

























