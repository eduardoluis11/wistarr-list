<?php
    /* It's better that I call the header and the footer in separate php tags
    to avoid the problem I had where the footer was being put above the header. There is no need to call the navbar
    once again since it's already included in header.php. */
    require "header.php";
?>

    <h1>Contact Us</h1>
    <p>
    If you have any questions, or if you have any trouble using the site (such as being unable to login into your
    account or wanting to delete your account,) send us an email at wistarr@tutanota.com.
    </p>

    <a href="index.php">Go back to home page.</a>

<?php require "footer.php"?>
