<!-- NAV -->
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="#" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/details-movie">Details test</a></li>
                <li><a href="#">Movies</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">About</a></li>
                <?php
                use Illuminate\Support\Facades\Session;
                $user = Session::get('customer');
                ?>
                @if (isset($user))
                    <a href="{{ route('logout') }}" class="btn btn-hover">
                        <span>{{ $user->name }}</span>
                    </a>
                @else
                    <li>
                        <a href="{{ route('signin') }}" class="btn btn-hover">
                            <span>Sign in</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- MOBILE MENU TOGGLE -->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</div>
<!-- END NAV -->
