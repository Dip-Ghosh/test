@extends('layout')
@section('content')


    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="row  alert alert-danger" role="alert" id="error-message" style="display: none">
                            <span class="text-danger-error justify-content-center"></span>
                        </div>
                        <div class="card-body">
                            <form id="login-form">
                                <div id="errors-list"></div>
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required
                                               autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>

        $(document).on("submit", "#login-form", function (event) {
            event.preventDefault();

            let url      = "{{ route('login.perform') }}";
            let email    = $("#email_address").val();
            let password = $("#password").val();
            let token    = "{{ csrf_token() }}";

            $.ajax({
                url: url,
                data: {
                  email: email,
                  password:password,
                  "_token" : token
                },
                type: "POST",
                dataType: 'json',
                success: function (response) {
                    if (response.status) window.location = response.data;
                    else {
                        $('.text-danger-error').text(response.message);
                        $('#error-message').css('display', 'block')
                    }
                }
            });

            return false;
        });
    </script>

@endsection
