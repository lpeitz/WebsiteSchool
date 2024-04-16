const validation = new JustValidate("#signup");

validation
    .addField("#name", [
        {
            rule: "required",
            errorMessage: "Name is required"
        }
    ])
    .addField("#email", [
        {
            rule: "required",
            errorMessage: "E-Mail is required"
        },
        {
            rule: "email",
            errorMessage: "E-Mail is invalid!"
        }
    ])
    .addField("#password", [
        {
            rule: "required",
            errorMessage: "Password is required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => 
            {
                if (value!== fields["#password"].elem.value) {
                    return false;
                }
                return true;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
       document.getElementById("regster").submit();
    });

