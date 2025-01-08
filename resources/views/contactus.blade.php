<x-app-layout>
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endpush

    @slot('content')
        <div class="contact-section fancy-bg">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Feel free to reach out using the form below.</p>

            <form action="{{ url('/send-message') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>

                <div class="form-group">
                    <label for="message"><i class="fas fa-comments"></i> Message:</label>
                    <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                </div>

                <button type="submit" class="btn">Send Message</button>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </form>

            <div class="map-section">
                <h3>Find Us</h3>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=..."
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
</x-app-layout>
