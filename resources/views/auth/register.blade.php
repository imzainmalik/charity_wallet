<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.compatibility')
    <!-- Fonts -->
    @include('includes.style')
    <!-- Scripts -->
    {{-- <head>Registration</head> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
 

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<main>
    <section class="siginScreen">
        <div class="left">
            <figure>
                <img class="img-fluid" src="assets/images/loginimg.webp" alt="">
            </figure>
        </div>
        <div class="right align-items-center">
            <div class="contBody">
                <div class="loginFormSec">
                    <h3>Signup to Charity wallet</h3>
                    <p>Already have an account? <a href="javascript:;" title="">Login</a></p>
                    <div class="singupBtn">
                        <div class="btns">
                            <a href="{{ route('register_with_google') }}" title="">Signup with Google</a>
                        </div>
                        <div class="socialLinks">
                            <a href="{{ route('register_with_facebook') }}" data-social="facebook" title="">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="javascript:;" data-social="twitter" title="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg>
                            </a>
                            <a href="javascript:;" data-social="apple" title="">
                                <i class="fab fa-apple"></i>
                            </a>
                        </div>
                    </div>
                    <div class="or">
                        <small>OR</small>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fields">
                                    <label>First Name</label>
                                    <input type="text" class="@error('f_name') is-invalid @enderror" required
                                        name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name"
                                        autofocus>
                                    @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fields">
                                    <label>Last Name</label>
                                    <input type="text" class="@error('l_name') is-invalid @enderror" required
                                        name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name"
                                        autofocus>
                                    @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="fields">
                                    <label>Email Address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fields">
                                    <label>Password</label>
                                    <input id="signupInputPassword" type="password" required class="@error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fields">
                                    <label>Confirm Password</label>
                                    <input id="password_confirmation" onkeyup="checkpassword()" type="password" required
                                    name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="password-strength-group" data-strength="">
                                    <div class="password-strength-message">
                                        <div class="message-item">
                                            Password strenght - Weak Password
                                        </div>

                                        <div class="message-item">
                                            Password strenght - Okay
                                        </div>

                                        <div class="message-item">
                                            Password strenght - Very Good
                                        </div>

                                        <div class="message-item">
                                            Password strenght - Very Strong!
                                        </div>
                                    </div>
                                    <div id="password-strength-meter" class="password-strength-meter">
                                        <div class="meter-block"></div>
                                        <div class="meter-block"></div>
                                        <div class="meter-block"></div>
                                        <div class="meter-block"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6" id="pass_match_error_msg" style="display:none"> 
                                <div class="text-danger">Confrim Password not matched with Password</div> 
                            </div>
                            <div class="col-md-12">
                                <div class="signBtnTheme">
                                    <input class="btnSubmit" type="submit" value="Sign Up">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>  
    <script>
        function checkpassword(){ 
            var Password = document.getElementById('signupInputPassword').value;
            var confirmPassword = document.getElementById('password_confirmation').value;
                console.log(Password, confirmPassword);
            if(confirmPassword != Password){
                document.getElementById('pass_match_error_msg').style.display = "block";
            }else{
                document.getElementById('pass_match_error_msg').style.display = "none";
            }
        }
    </script> 
@include('includes.script')

