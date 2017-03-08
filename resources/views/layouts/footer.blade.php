@section('footer')
    <v-footer class="dark-blue">
        <div class="text-xs-center">
            Laravel Issue Tracker and Project Management Software (v0.1 dev#{{ base64_encode(env('APP_KEY')) }}) - Copyright {{ date('Y') }}
        </div>
    </v-footer>
@endsection