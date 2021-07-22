<!-- NAV -->
<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="#" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>B<span class="main-color">M</span>W
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="/">Trang chủ</a></li>
                {{-- <li><a href="/history">History</a></li> --}}
                <li><a class="scroll-div" href="#sectionMovies">
                        Phim</a></li>
                {{-- <li><a href="#">Series</a></li> --}}
                <li><a class="scroll-div" href="#sectionAbout">Giới thiệu</a></li>
                <?php
                use Illuminate\Support\Facades\Session;
                $user = Session::get('customer');
                ?>
                @if (isset($user))
                    {{-- <a href="{{ route('logout') }}" class="btn btn-hover">
                        <span>{{ $user->name }}</span>
                    </a> --}}
                    <li class="dropdown-info">
                        <a class="user-info" href="javascript:void(0)">Xin chào : {{ $user->name }} <i
                                class='bx bxs-right-arrow'></i></a>
                        <ul class="dropdown-info-list">
                            <li class="dropdown-info-item">
                                <a href="/info" class="dropdown-info-link">Thông tin tài khoản</a>
                            </li>
                            <li class="dropdown-info-item">
                                <a href="/history" class="dropdown-info-link">Lịch sử đặt vé</a>
                            </li>
                            <li class="dropdown-info-item">
                                <a href="{{ route('logout') }}" class="dropdown-info-link">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('signin') }}" class="btn btn-hover">
                            <span>Đăng nhập</span>
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
