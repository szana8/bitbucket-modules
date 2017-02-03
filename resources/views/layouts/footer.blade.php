@section('footer')
    <footer role="contentinfo">
        <div class="container">
            <p>
                Laravel Issue Tracker and Project Management Software (v0.1 dev#{{ base64_encode(env('APP_KEY')) }}) - Copyright {{ date('Y') }}
            </p>
            <p>
                <img src="{{ url('/') }}/img/laravel-logo.png" width="250px" class="laravel-logo">
            </p>
        </div>
    </footer>
@endsection