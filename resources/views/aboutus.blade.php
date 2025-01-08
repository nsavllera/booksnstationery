<x-app-layout>
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endpush

    @slot('content')
    <div class="about-section fancy-bg">
        <h2>About Us</h2>
        <p style="text-align:center;">Welcome to the Simply Stationery! Founded in 2024, we are passionate about delivering top-quality books and stationery to our customers worldwide.</p>

        <div class="features">
            <div class="feature-card">
                <i class="fas fa-book"></i>
                <h3>Wide Collection</h3>
                <p>From academic books to office supplies, we have everything you need.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-handshake"></i>
                <h3>Trusted by Millions</h3>
                <p>Over a decade of excellence in providing quality products.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-truck"></i>
                <h3>Fast Delivery</h3>
                <p>Quick and reliable shipping worldwide.</p>
            </div>
        </div>

        <h2 style="text-align: center; padding: 12px; ">Meet Our Team</h2>
        <div class="team">
            <div class="team-member">
                <img src="{{ asset('/images/icon1.jpg') }}" alt="">
                <div class="team-info">
                    <h3>Serena Ng Yen Xin</h3>
                    <p>Developer #1</p>
                </div>
            </div>
            <div class="team-member">
                <img src="{{ asset('/images/icon1.jpg') }}" alt="">
                <div class="team-info">
                    <h3>Nurulaina Nisa</h3>
                    <p>Developer #2</p>
                </div>
            </div>
            <div class="team-member">
                <img src="{{ asset('/images/icon1.jpg') }}" alt="">
                <div class="team-info">
                    <h3>Nurul Jannah</h3>
                    <p>Developer #3</p>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>

