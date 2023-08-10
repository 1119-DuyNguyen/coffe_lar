@extends('frontend.layouts.master')

@section('title')
    {{--    {{$settings->site_name}} || Login--}}
@endsection

@section('content')



    {{--    custom button tab--}}
    <style>
        .wsus__login_reg_area .nav-item .nav-link {
            border-radius: 0px;
        }

        .wsus__login_reg_area .nav-item:first-child .nav-link {
            border-radius: 5px 0px 0px 5px;
        }

        .wsus__login_reg_area .nav-item:last-child .nav-link {
            border-radius: 0px 5px 5px 0px;
        }
    </style>

    <!--============================
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active " id="pills-home-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-homes" type="button" role="tab"
                                        aria-controls="pills-homes"
                                        aria-selected="true">login
                                </button>
                            </li>
                            <li class="nav-item " role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-profiles" type="button" role="tab"
                                        aria-controls="pills-profiles" aria-selected="true">signup
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                 aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="email" type="email" value="{{old('email')}}" name="email"
                                                   placeholder="Email">
                                        </div>

                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password" type="password" name="password" placeholder="Password">
                                        </div>


                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" name="remember" class="form-check-input"
                                                       type="checkbox"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password
                                                ?</a>
                                        </div>

                                        <button class="common_btn" type="submit">login</button>
                                        {{-- <p class="social_text">Sign in with social account</p>
                                        <ul class="wsus__login_link">
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                 aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="name" name="name" value="{{old('name')}}" type="text"
                                                   placeholder="Name">
                                        </div>


                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input id="email" type="email" name="email" value="{{old('email')}}"
                                                   type="text" placeholder="Email">
                                        </div>


                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password" name="password" type="password" placeholder="Password">
                                        </div>


                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password_confirmation" type="password"
                                                   name="password_confirmation" placeholder="Confirm Password">
                                        </div>

                                        <button class="common_btn mt-4" type="submit">signup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       LOGIN/REGISTER PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        var forms = document.querySelectorAll("#wsus__login_register form");
        // console.log(forms)

        //init span error message
        forms.forEach(form => {
            let inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                let parent = input.parentElement;
                let span = document.createElement('div');
                span.innerHTML = `
                    <span class="text-danger error-text ${input.name}_error"
                    style="color: red"></span>`;

                parent.insertAdjacentHTML('afterend', span.outerHTML);
            })
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                var all = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: all,
                    beforeSend: function () {

                        $(document).find('span.error-text').text('');
                    },
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            // validation error fails
                            if(responseObject.responseJSON)
                            {
                                let errors=responseObject.responseJSON.errors;
                                if(errors){
                                    for (const [prefix, value] of Object.entries(errors)) {
                                        let span=form.querySelector('span.' + prefix + '_error');
                                        span.innerText=value

                                        let input = form.querySelector('input[name=' + prefix + ']');
                                        input.focus();
                                    }

                                }
                            }

                        },
                        503: function(responseObject, textStatus, errorThrown) {
                            // Service Unavailable (503)
                            // This code will be executed if the server returns a 503 response
                        }
                    },
                    success: function (data) {

                            window.location.replace(
                                '{{Redirect::intended(route("dashboard"))->getTargetUrl()}}'
                            );
                        // } else if (data == 2) {
                        //
                        //     $("#show_error").hide().html("Invalid login details");
                        // }

                    }
                    ,
                    errors: function (data) {

                    }
                })

            });

        })


    </script>

@endpush
