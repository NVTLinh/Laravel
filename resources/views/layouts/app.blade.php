<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .sidebar{
        min-width: 270px;
        min-height: 100vh;
        border-right: 1px solid #d1d1d1;
        padding-top: 80px;
    }
    .main{
        background-color: #dddddddc;
        width: 100%;
    }
    .custom-navlink{
        font-weight: bold;
        font-size: 25px;
        padding-right: 16px;
    }
    .app-header{
        height: 80px;
        background-color: #fff;
        border-bottom: 1px solid #d1d1d1;
    }
</style>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <ul class="list-group">
                <li class="list-group-item border-0">
                    <a class="nav-link custom-navlink" href="/brands">Brands</a>
                </li>
                <li class="list-group-item border-0">
                    <a class="nav-link custom-navlink" href="/categories">Categories</a>
                </li>
                <li class="list-group-item border-0">
                    <a class="nav-link custom-navlink" href="/products">Products</a>
                </li>
              </ul>
        </div>
        <main class="main">
            <header class="app-header">

            </header>
           <div class="p-3">
                @yield('content')
           </div>
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>