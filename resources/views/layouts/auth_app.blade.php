@extends('layouts.app')

@section('overallContent')
    <div class="container-scroller" id="app">
        @include('parts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('parts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')

                </div>
                @include('parts.footer')
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
