<x-guest-layout>



    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-center mb-3">
                    <div style="margin-left: -20px;margin-right: -20px;margin-top: -40px">
                        {{-- <a href="" style="font-size: 35px;font-weight:bolder">Cubix information systems</a> --}}
                        <a href="{{url('/')}}"><img src="{{asset('public/images')}}/cubix.png" style="width:75%;height: 146px;" alt=""></a>
                    </div>
                </div><br>
                <h4 class="text-center mb-4" style="margin-top: -11px">Sign in your account</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" name="email" id="email" placeholder="Email or Phone" class="form-control" :value="old('email')" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="mb-1"><strong>Password</strong></label>
                        <div style="position: relative;">
                            <input type="password" name="password" id="password" class="form-control pass-key" placeholder="Password" required autocomplete="current-password">
                            <span style="position: absolute;right: 10px;top: 10px;cursor: pointer;" class="show_password">SHOW</span>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                        <div class="form-group">
                        <div class="custom-control custom-checkbox ml-1">
                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                <label class="custom-control-label pt-1" for="basic_checkbox_1">Remember my preference</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="page-forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                    </div>

                   
                </form>

                {{-- <a href="">
                    <button class="google-button">
                        <div class="google-icon-wrapper">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48">
                            <g>
                              <path fill="#EA4335"
                                d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                              </path>
                              <path fill="#4285F4"
                                d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                              </path>
                              <path fill="#FBBC05"
                                d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                              </path>
                              <path fill="#34A853"
                                d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                              </path>
                              <path fill="none" d="M0 0h48v48H0z"></path>
                            </g>
                          </svg>
                        </div>
                        <p class="google-button-text">Sign in with Google</p>
                      </button>
                </a> --}}
                {{-- <div class="new-account mt-3">
                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                    </div> --}}
            </div>
        </div>
    </div>

</x-guest-layout>

<script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show_password');
    showBtn.addEventListener('click', function(){
        if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
        }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
        }
    });
</script>
