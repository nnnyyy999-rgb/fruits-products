<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits Products</title>
    
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body class="@yield('body_class')">

    <header class="header">
        <div class="header-left">
            <div class="logo">mogitate</div>
        </div>

    </header>

    <main class="main-container">
        @yield('content')
    </main>

</body>
</html>
