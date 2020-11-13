/* File: main.js */
const cookieContainer = document.querySelector(".cookie-container")
const cookieButton = document.querySelector(".cookie-btn")

cookieButton.addEventListener("click", () => {
    cookieContainer.classList.remove("active");
    /* This is the cookie stored on the user's computer that will check whether
    * the user gave their consent to receive cookies or not. If the click on
    * "I accept", a cokkie will be stored on their computer.
    * Note: to delete this cookie, go to "inspect" -> "application"
    * -> "Local Storage" -> "URL of the website", and look for
    * "cookieBannerDisplayed". This way, I will reactivate the cookie banner. */
    localStorage.setItem("cookieBannerDisplayed", "true")
})

setTimeout(() => {
    /* This checks if the user didn't click on "I accept" on the cookie banner,
    that is, it checks if the user has the cookie that says that they consent
    cookies. */
    if(!localStorage.getItem("cookieBannerDisplayed"))
    {
        /* If the user didn't click on "I accept", they will keep getting the
        * cookie consent banner. If the click on "I accept", they will never
        * see the cookie banner again. */
        cookieContainer.classList.add("active");
    }
}, 2000);