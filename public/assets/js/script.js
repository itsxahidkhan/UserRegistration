$(document).ready(function() {
    $("#register_form").submit(function(event) {
        event.preventDefault();

        // Reset previous error messages
        $("#error-section").empty();

        // Validate the form
        let errorMessage = "";

        const username = $("#username").val().trim();
        if (!username) {
            errorMessage += "<p>Username is required</p>";
        }

        const password = $("#password").val().trim();
        if (!password) {
            errorMessage += "<p>Password is required</p>";
        }

        const confirmPassword = $("#confirm_password").val().trim();
        if (password !== confirmPassword) {
            errorMessage += "<p>Passwords do not match</p>";
        }

        const email = $("#email").val().trim();
        if (!email) {
            errorMessage += "<p>Email is required</p>";
        } else if (!isValidEmail(email)) {
            errorMessage += "<p>Invalid email format</p>";
        }

        // Display error messages in the error section
        $("#error-section").html(errorMessage);

        // Submit the form if no errors
        if (!errorMessage) {
            this.submit();
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }



    // login form


    $("#login_form").submit(function(event) {
        event.preventDefault();

        // Reset previous error messages
        $("#error-section").empty();

        // Validate the form
        let errorMessage = "";
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();

        if (!email) {
            errorMessage += "<p>Email is required</p>";
        }

        if (!password) {
            errorMessage += "<p>Password is required</p>";
        }

        // Display error messages in the error section
        $("#error-section").html(errorMessage);

        // Submit the form if no errors
        if (!errorMessage) {
            this.submit();
        }
    });


});

