<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/website/css/signin.css">
    <title>Đăng Ký</title>
</head>

<body>
    <style>
        /* .form.sign-in .input-group {
        position: relative;
    } */
        .form.sign-in .input-group input {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
        }

        .alert-danger__note {
            /* position: absolute;
        top: 0;
        left: 100%; */
            color: red;
            font-weight: 500;
            text-align: left;
        }

        .back {
            z-index: 10;
            color: #fff;
            user-select: text;
            pointer-events: visible;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-size: 25px;
            justify-content: flex-end;
            transition: all 0.3s ease-in-out;
        }

        .back:hover {
            transform: translateY(-10px);
        }

        .back i {
            padding-right: 7px;
        }

        .bx-tada {
            -webkit-animation: tada 1.5s ease infinite;
            animation: tada 1.5s ease infinite;
        }

    </style>
    <div id="container" class="container">
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form sign-up">
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" placeholder="Username" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger alert-danger__note ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger alert-danger__note ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <i class='bx bx-phone'></i>
                                <input type="text" placeholder="Number phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="alert alert-danger alert-danger__note ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Password" name="password">
                                @error('password')
                                    <div class="alert alert-danger alert-danger__note ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Confirm password" name="password_confirm">
                                @error('password_confirm')
                                    <div class="alert alert-danger alert-danger__note ">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit">
                                Đăng ký
                            </button>
                            <p>
                                <span>
                                    Bạn đã có tài khoản ?
                                </span>
                                <a href="{{ route('signin') }}" class="pointer">
                                    Đăng nhập tại đây
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                    <img src="/website/images/undraw_movie_night_fldd.svg" alt="welcome">
                </div>
                <div class="text sign-up">
                    <a class="back" href="/"><i class='bx bx-arrow-back main-color bx-tada'></i>Quay lại</a>
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
        </div>
        <!-- END CONTENT SECTION -->
    </div>
    <script>
        let container = document.getElementById('container')

        toggle = () => {
            container.classList.toggle('sign-up')
            // container.classList.toggle('sign-in')
        }

        setTimeout(() => {
            container.classList.add('sign-up')
        }, 200)
    </script>
</body>

</html>
