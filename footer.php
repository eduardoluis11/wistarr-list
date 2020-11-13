    <!-- This div closes the container that is affected by Bootstrap -->
    </div>

    <footer id="bodyFooter3">
    <!-- The footer will also be affected by Bootstrap. I will add some padding top to add more space between
     the footer and the webpage's body.-->
    <div class="container-fluid pt-5">
        <!-- Link to the terms and conditions, and the privacy policy. -->
        <a href="terms_conditions.php">Terms and Conditions</a>
        <!-- This "|" helps distinguish the Terms and Conditions link to the Privacy Policy one. -->
        |
        <a href="privacy_policy.php">Privacy Policy</a>
    </div>
    <div style="font-size: 12px" class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm">
                <!-- This is my copyright notice, which will be automatically updated each year. -->
                <p>
                    Copyright &copy; <script>document.write(new Date().getFullYear())</script> Wistarr
                </p>
            </div>
            <div class="col-sm">
                <p>All games are copyright of their respective owners.</p>
            </div>
            <div class="col-sm">
                <!-- This contains a link to the source where I got inspiration to make the cookie consent banner. This
                 has custom css, so I won't put it inside the container that is affected by Bootstrap. I added the
                 margin for the banner source in here. -->
                <p>The cookie consent banner was made by using <a href="https://github.com/Godsont/Cookie-Consent-Banner"
                                                                                                             target="_blank">Godson Thomas</a>' banner as a reference.</p>
            </div>
        </div>
    </div>
    </footer>

    <!-- Cookie consent Banner. -->
    <!-- Container that will contain the cookie consent banner. I will also create an id to avoid problems with
     Bootstrap. The Footer elements are layered in such a way that they are appearing to the front of the cookie
     banner. Fix that, since its text is appearing on top of the cookie banner, and that is also causing me to
     not be able to click the "I accept" button properly. IT WORKS NOW. I had to put it below the footer. -->
    <div id="cookie-container" class="cookie-container">
        <p>
            We use cookies to collect some information from every person that uses our website. You can read how we use cookies
            in our <a href="privacy_policy.php" target="_blank"><u>Privacy Policy</u></a> and our
            <a href="terms_conditions.php" target="_blank"><u>Terms and Conditions</u></a>. Click “I Accept” if you
            give us your permission to use our cookies to collect your information.
        </p>

        <button id="cookie-btn" class="cookie-btn">
            I Accept
        </button>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Script for the cookie consent banner to make it work. -->
    <script src="./js/main.js"></script>
</body>
</html>