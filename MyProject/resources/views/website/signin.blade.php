<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/website/css/signin.css">
    <title>Login</title>
</head>

<body>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Confirm password">
                        </div>
                        <button>
                            Sign up
                        </button>
                        <p>
                            <span>
                                Already have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                            </b>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-up">
                        <div class="align-items-center facebook-bg">
                            <i class='bx bxl-facebook'></i>
                        </div>
                        <div class="align-items-center google-bg">
                            <i class='bx bxl-google'></i>
                        </div>
                        <div class="align-items-center twitter-bg">
                            <i class='bx bxl-twitter'></i>
                        </div>
                        <div class="align-items-center insta-bg">
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">
                <form action="{{route('login_customer')}}" method="POST">
                    @csrf
                    <div class="form-wrapper align-items-center">
                        <div class="form sign-in">
                            @if(session()->has('message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Password" name="password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit">
                                Sign in
                            </button>
                            <p>
                            <span>
                                Don't have an account?
                            </span>
                                <b onclick="toggle()" class="pointer">
                                    Sign up here
                                </b>
                            </p>
                        </div>
                    </div>
                </form>

            </div>
            <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome back
                    </h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit obcaecati, accusantium
                        molestias, laborum, aspernatur deserunt officia voluptatum tempora dicta quo ab ullam. Assumenda
                        enim harum minima possimus dignissimos deserunt rem.
                    </p>
                </div>
                <div class="img sign-in">
                    <img src="/website/images/undraw_horror_movie_3988.svg" alt="welcome">
                </div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                    <img src="/website/images/undraw_movie_night_fldd.svg" alt="welcome">
                </div>
                <div class="text sign-up">
                    <h2>
                        Join with us
                    </h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit obcaecati, accusantium
                        molestias, laborum, aspernatur deserunt officia voluptatum tempora dicta quo ab ullam. Assumenda
                        enim harum minima possimus dignissimos deserunt rem.
                    </p>
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>

    <script>
        let container = document.getElementById('container')

        toggle = () => {
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }

        setTimeout(() => {
            container.classList.add('sign-in')
        }, 200)
    </script>
</body>

</html>
