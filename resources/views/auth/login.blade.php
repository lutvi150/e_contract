<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="shortcut icon" href="{{ asset('image/favicon-96x96.png') }}" type="image/x-icon">
    <title>{{config("app.name")}}</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{ asset('image/back_ground.png') }}) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-6 col-md-6 modal-bg-img"
                    style="background-image: url({{ asset('image/cover_login.jpg') }});">
                </div>
                <div class="col-lg-6 col-md-6 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{asset('image/favicon-96x96.png')}}" alt="wrapkit"
                                style="width: 60px; height: 70px">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Use email and password to access </p>
                       <div class="msg-alert" hidden>
                        <div class="alert alert-danger"  role="alert">
                            <strong class="alert-title">Login Gagal</strong>
                            <p class="alert-text">Username atau password yang anda gunakan salah !</p>
                        </div>
                       </div>
                       @if ($message=Session::get('error'))
                       <div class="alert alert-danger"  role="alert">
                        <strong>Error</strong>
                        <p>{{ $message }}</p>
                    </div>
                       @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username </label>
                                        <input id="email" type="text" class="form-control " name="email" value=""
                                            required autocomplete="email" autofocus placeholder="Email">
                                            <span class="red email"></span>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input id="password" type="password" class="form-control " name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                            <span class="red password"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="show-loading">
                                        <div class="spinner-border" role="status">

                                        </div>
                                        <span class="">Login Proses mohon tunggu...</span>
                                    </div>
                                    <div class="show-button">
                                        <button type="button" onclick="login()" class="btn btn-block btn-dark">Sign
                                            In</button>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/jquery/dist/jquery.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

    <script>
        $(document).ready(function () {
            show_loading('hide');
        });
        const url = "{{ url('') }}";
        $(".preloader ").fadeOut();

        function login() {
            $(".email").text("");
                        $(".password").text("");
           show_loading('show');
           $(".msg-alert").attr("hidden","true");
            let data = {
                email: $("#email").val(),
                password: $("#password").val(),
                _token:"{{ csrf_token() }}"
            }
            setTimeout(function () {
               show_loading('hide');
               proses_login(data)
            }, 5000);
        }
        function proses_login(data) {
             $.ajax({
                type: "POST",
                url: url+"/login/verification",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    if (response.status=='validationerror') {
                        $(".email").text(response.erors.email);
                        $(".password").text(response.erors.password);
                    } else if (response.status=='failed') {
                        $('.alert-title').text('Login gagal');
                        $('.alert-text').text("username dan password yang anda gunakan salah !");
                        $(".msg-alert").removeAttr("hidden");

                    }else if (response.status=='success') {
                        window.location.href="{{ url('login') }}";
                    }
                },error:function(){
                    $('.alert-title').text('service error');
                    $('.alert-text').text('sorry service error');
                    $('.msg-alert').removeAttr('hidden');
                }
            });
        }

        function show_loading(params) {
            if (params == 'show') {
                $(".show-button").hide();
                $(".show-loading").show();
            } else{
                $(".show-button").show();
                $(".show-loading").hide();
            }
        }

    </script>
</body>

</html>
