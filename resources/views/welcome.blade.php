<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simply Stationery</title>
    <!-- Fonts -->
    
    <style>
        body {
            margin: 0;
            font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f7f7f7;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #A5BFCC;
            border-radius: 8px 8px 0 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 70px;
            margin-right: 10px;
        }

        .header .logo .name {
            color: #fff;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .header .actions .nav-link {
            background-color: #FFF7D1;
            border: none;
            padding: 8px 16px;
            border-radius: 12px;
            margin-left: 10px;
            color: #3A3960;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1rem;
        }

        .header .actions .nav-link:hover {
            background-color: #e0e7ff;
        }

        .container {
            width: 95%;
            margin: 20px auto;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgba(245, 245, 245, 0.8)), url("bakery-background.jpeg") no-repeat center;
            background-size: cover;
            border-radius: 0 0 8px 8px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #3A3960;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #3A3960;
            line-height: 1.8;
            margin-bottom: 20px;
            padding: 0 15%;
        }

        .cta {
            display: inline-block;
            background-color: #3A3960;
            color: #FFF7D1;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 1rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cta:hover {
            background-color: #3A3960;
        }

        @media (max-width: 768px) {
            .container p {
                padding: 0 5%;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <img src="/images/logo.png" alt="Logo">
            <div class="name">Simply Stationery</div>
        </div>
        <div class="actions">
            @if (Route::has('login'))
                @auth
                    <a href="{{route('dashboard')}}" class="nav-link">Home</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Welcome to Simply Stationery</h1>
        <p>
            Discover a curated collection of stationery and office supplies that bring creativity and elegance to your daily tasks. From premium notebooks to stylish pens, we have everything to elevate your workspace.
        </p>
        <a href="#" class="cta">Shop Now</a>
    </div>
</body>
</html>
