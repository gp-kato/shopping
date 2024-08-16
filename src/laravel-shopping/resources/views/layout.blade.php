<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="icon" href="/img/favicon.ico">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <header id="header" class="wrapper">
            <div class="site-title">
                <a href="index"><img src="{{asset('img/logo.svg')}}" alt="Furniture Design"></a>
            </div>

            <nav id="navi">
                <ul class="nav-menu">
                    <li><a href="products">PRODUCTS</a></li>
                    <li><a href="about">ABOUT</a></li>
                    <li><a href="company">COMPANY</a></li>
                    <li><a href="mailto:xxxxx@xxx.xxx?subject=お問い合わせ">CONTACT</a></li>
                </ul>
            </nav>

            <div class="toggle_btn">
                <span></span>
                <span></span>
            </div>

            <div id="mask"></div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer id="footer" class="wrapper">
            <ul class="menu">
                <li><a href="https://www.instagram.com/" target="_blank">INSTAGRAM</a></li>
                <li><a href="https://twitter.com/" target="_blank">TWITTER</a></li>
                <li><a href="https://www.facebook.com/" target="_blank">FACEBOOK</a></li>
            </ul>
            <p class="copyright">&copy; Furniture Design</p>
        </footer>
    </body>
</html>
