<?php
    // File: login.php
    // This is where the user can login.
    // I need to delete the user's with plain-text passwords and create them again, since they won't be able to login
    // since their passwords aren't hashed.
    require_once "pdo.php";
    require "header.php";

    /* This boolean variable will check if the user is logged in or not. I will use it here and on "index.php". */
    $GLOBALS['loggedIn'] = false;

    /* If the user comes from the sign up page (register.php), and they
    successfully created an account, the account confirmation flash
    message will appear here. IT WORKED. */
    if ( isset($_SESSION['success']) )
    {
        echo '<p style="color:green">' . $_SESSION['success'] . "</p><br>";
        unset($_SESSION['success']);
    }

    /* This is the format of the error message (red color, and it will disappear after refreshing the page.) */
    if ( isset($_SESSION['error']) )
    {
        echo '<p style="color:red">' . $_SESSION['error'] . "</p><br>";
        unset($_SESSION['error']);
    }

    /* This will check if the email and password boxes have been filled out. */
    if ( isset($_POST['email']) && isset($_POST['password']) )
    {
        /* This will log out the current user, so that I can log in with
        the new credentials that I just inserted. */
        unset($_SESSION['email']);

        /* This SQL statement will search for the email and passwords that were inserted on the login form. I will
        modify it so that it only looks for the user's email.*/
        $stmt = $pdo->prepare("SELECT * FROM users 
            WHERE email = :email");
        $stmt->execute(array(
                ':email' => $_POST['email']
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        /* If the email isn't in the database, I will display an error message. IT WORKS. */
        if ( $row === false )
        {
            $_SESSION['error'] = 'You inserted a wrong email and/or password.';
            header( 'Location: login.php' );
            return;
        }
        /* This executes if the email is in the database. */
        else
        {
            /* I will create a new condition that checks if the password entered is the same as the password that
            is currently hashed in the database. The first parameter in "password_verify" is the password that was just
            inserted by the user in the login for. The 2nd parameter is the hashed password in the database ($row
            is the array that contains all of the data selected from the database's query, and I only want the
            password field.).. IT WORKED PERFECTLY. */
            if ( password_verify($_POST['password'], $row['password']) )
            {
                $_SESSION['success'] = "You're now logged in!";

                /* This will log in the user with the email that they
                just inserted. In other words, this will insert the recently
                inserted email into the "SESSION[email]" array. IT WORKS */
                $_SESSION['email'] = $_POST["email"];

                /* I will store the user's id into the SESSION array. I will use this later to insert the user's id
                into "user_id", so that each game has the user id from each user. IT WORKS. */
                $_SESSION['user_id'] = $row['id'];

                /* I will set the "loggedIn" variable to true. This way, the games' list will become visible in
                index.php. I MAY DELETE THIS LATER. */
                //$GLOBALS['loggedIn'] = true;

                /* This will redirect the user to another webpage once they log in (like "index.php"). */
                header( 'Location: index.php' );
                return;


                /* I will make a test. I will print the unhashed password
                in here. This didn't work, and it's too difficult for me. Look for a tutorial for unhashing passwords. */
            }
            /* If the password entered by the user isn't the same as the unhashed password, this executes. */
            else {
                $_SESSION['error'] = 'You inserted a wrong email and/or password.';
                header( 'Location: login.php' );
                return;
            }



        /* This will show a confirmation flash message if the email and password combination is found on the
        database. This is not working. I'm never getting a confirmation message if I get the right combination,
        and I'm never getting redirected to "index.php" either. There seems to be an error if $row is true. */
        }
    }
?>

<h1>Log In</h1>
<p>Please, login.</p>
<form method="post">
    <!-- The user needs to insert their email and password. -->
    <p>Email:
        <input type="text" name="email"></p>
    <p>Password:
        <input type="password" name="password"></p>
    <p>Forgot your password? Send us an email at wistarr@tutanota.com to help you login into your account.</p>

    <!-- This submits the form. -->
    <p><input type="submit" value="Login"/>
</form>

<?php require "footer.php"; ?>


