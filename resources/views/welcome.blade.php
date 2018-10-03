<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="manifest" href="/manifest.json">

</head>
<body>
<div class="container py-8" id="app">
    <stepper-parent>
        <div class="lg:mr-auto lg:ml-8" v-cloak>
            <form action="/">
                <stepper-form :active="true">
                    @include('form.form1')
                </stepper-form>
                <stepper-form>
                    @include('form.form2')
                </stepper-form>
                <stepper-form>
                    @include('form.form3')
                </stepper-form>
            </form>
        </div>
        <div class="mb-8 lg:mb-0 lg:w-64 lg:ml-8">
        </div>
    </stepper-parent>
</div>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script>
    if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>
</body>
</html>
