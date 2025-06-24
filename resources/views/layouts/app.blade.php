<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Beranda') - Electronic Smart</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar .left img {
            height: 40px;
        }

        .navbar .center {
            display: flex;
            gap: 30px;
        }

        .navbar .center a {
            color: #000;
            text-decoration: none;
            font-weight: 500;
        }

        .navbar .right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar .right a {
            text-decoration: none;
            font-weight: 500;
        }

        .navbar .right .login-btn {
            background-color: #007bff;
            padding: 6px 16px;
            border-radius: 4px;
            color: white;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="left">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </a>
        </div>

        <div class="center">
            <a href="/">Home</a>
            <a href="#">Gallery</a>
            <a href="#">Blog</a>
            <a href="/shop">Shop</a>
            <a href="/order">Order</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>

        <div class="right">
            @auth
                <a href="{{ route('cart.index') }}">
                    🛒
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="login-btn" style="background-color: red;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            @endauth
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const faders = document.querySelectorAll('.fade-scroll');

    const options = {
        threshold: 0.3
    };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            entry.target.classList.add('fade-in');
            observer.unobserve(entry.target);
        });
    }, options);

    faders.forEach(el => {
        el.classList.add('fade-init');
        appearOnScroll.observe(el);
    });
});
</script>


</body>
</html>
