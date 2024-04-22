const validation = new JustValidate("#signup");

validation
    .addField("#name", [
        {
            rule: "required",
            errorMessage: "Name is required" // Typo corrected
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                       .then(response => response.json())
                       .then(json => json.available);
            },
            errorMessage: "Email already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords must match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });
