<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <link rel="icon" type="image/png" href="{{url('/assets/login/images/icons/favicon.ico')}}"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{url('/assets/register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{url('/assets/register/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>

<div class="main" style="background-image: url({{url('/assets/login/images/bg-01.jpg')}});">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    @if(session()->has('msg'))
                        <div class="alert alert-{{session()->pull('type')}}" role="alert">
                            {{session()->pull('msg')}}
                        </div>
                    @endif
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register_form" action="{{route('submit-registration')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"/>
                            <input type="hidden" name="role" id="role" value="agent"/>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{url('/assets/register/images/signup-image.jpg')}}" alt="sing up image"></figure>
                    <a href="{{route('login-route')}}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>


</div>

<!-- JS -->
<script src="{{url('/assets/register/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('/assets/register/js/main.js')}}"></script>
<script src="">
    $(document).ready(function (){

        // $(document).on('click', '#signup', function (e) {
        //     e.preventDefault();
        //
        //         $.post('http://real-estate-apis.test/api/register', $('#register_form').serialize(), function (data) {
        //             let res= JSON.parse(data);
        //             console.log(res);
        //             // if(res.type =="danger"){
        //             //     $('.messageAlert .validateMsg').text(res.message);
        //             //     $('.messageAlert').removeClass("alert-success");
        //             //     $('.messageAlert').addClass("alert-danger show");
        //             // }else {
        //             //     $('.messageAlert .validateMsg').text(res.message);
        //             //     $('.messageAlert').removeClass("alert-danger");
        //             //     $('.messageAlert').addClass("alert-success show");
        //             // }
        //         });
        // });
    });
</script>
</body>
</html>
