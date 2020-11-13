<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <!-- This will send the user back to the home page when they click on the
     site's logo. -->
    <a class="navbar-brand" href="index.php">Wistarr List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <!-- I'll see if the button grays out if I remove the "active" class (it did). -->
            <li class="nav-item">
                <!-- This will send the user back to the home page. -->
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
        </ul>
        <!-- This will create the Login and Sign Up buttons in the Navbar. -->
        <ul class="navbar-nav ml-auto">
            <?php
                // This will create the login and sign in buttons if the user is logged out. IT DIDNT WORK. IT WORKED
                // NOW. I had to begin a session with "session start()".
                if ( ! isset($_SESSION['email']) )
                {
            ?>
                    <li class="nav-item">
                    <!-- This will send the user back to the home page. -->
                    <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                    </li>
            <?php
                }
                else
                {
                    // This will create the log out button in the navbar once the user logs in.
            ?>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
            <?php
                }
            ?>

        </ul>
    </div>
</nav>