<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/website/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/website/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/website/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/website/css/slider-radio.css">
    <link rel="stylesheet" href="/website/css/select2.min.css">
    <link rel="stylesheet" href="/website/css/magnific-popup.css">
    <link rel="stylesheet" href="/website/css/plyr.css">
    <link rel="stylesheet" href="/website/css/main.css">
</head>

<!-- sign in -->
<div class="sign section--full-bg" data-bg="website/img/bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- registration form -->
                    <form action="{{route('register')}}" class="sign__form" method="POST">
                        @csrf
                        <a href="/" class="sign__logo">
                            <img src="website/img/logo.svg" alt="">
                        </a>
                        <div class="sign__group">
                            <input type="text" class="sign__input" placeholder="Name" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="sign__group">
                            <input type="text" class="sign__input" placeholder="Email" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="sign__group">
                            <input type="password" class="sign__input" placeholder="Password" name="password" value="{{old('password')}}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="sign__group">
                            <input type="text" class="sign__input" placeholder="Phone number" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="sign__group">
                            <input type="text" class="sign__input" placeholder="Addresss" name="address" value="{{old('address')}}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <button class="sign__btn" type="submit">Sign up</button>
                        <span class="sign__text">Already have an account? <a href="{{route('signin')}}">Sign in!</a></span>
                    </form>
                    <!-- registration form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end sign in -->
</html>