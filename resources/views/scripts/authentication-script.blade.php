<script type="text/javascript">

    //registration form submission
    $(document).on("submit", "#registration-form", function (event) {
        event.preventDefault();

        let url = "{{ route('register.perform') }}";
        let name = $("#name").val();
        let email = $("#email_address").val();
        let password = $("#password").val();
        let confirmPassword = $("#confirm_password").val();
        let token = "{{ csrf_token() }}";

        $.ajax({
            url: url,
            data: {
                name: name,
                email: email,
                password: password,
                confirm_password: confirmPassword,
                "_token": token
            },
            type: "POST",
            dataType: 'json',
            success: function (response) {
                if (response.status) window.location = response.redirect;
            },
            error: function (response) {
                $('.name-error').text(response.responseJSON.errors.name);
                $('.email-error').text(response.responseJSON.errors.email);
                $('.password-error').text(response.responseJSON.errors.password);
                $('.confirm-password-error').text(response.responseJSON.errors.confirm_password);
            }
        });
    });

    //login form submission
    $(document).on("submit", "#login-form", function (event) {
        event.preventDefault();

        let url = "{{ route('login.perform') }}";
        let email = $("#email_address").val();
        let password = $("#password").val();
        let token = "{{ csrf_token() }}";

        $.ajax({
            url: url,
            data: {
                email: email,
                password: password,
                "_token": token
            },
            type: "POST",
            dataType: 'json',
            success: function (response) {
                if (response.status) window.location = response.redirect;
                else {
                    $('.text-danger-error').text(response.message);
                    $('#error-message').css('display', 'block')
                }
            },
            error: function (response) {
                $('.email-error').text(response.responseJSON.errors.email);
                $('.password-error').text(response.responseJSON.errors.password);
            }
        });
    });
</script>
