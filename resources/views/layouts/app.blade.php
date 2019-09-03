<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- 
    <title>{{ config('app.name', 'Laravel') }}</title> -->

    <title>Dyverse Studio 歧響音樂</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Dyverse Studio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://dyverse.studio">
    <meta property="og:image" content="http://dyverse.studio/img/og.png">
    <meta property="og:description" content="創立於2016年，承襲多元的音樂風格，利用錄音、混音及配樂等媒介，延展音樂的無限可能，使每一個作品，成為獨一無二的聽覺饗宴。">
    <meta name="keywords" content="Dyverse Studio,音樂工作室,音樂,配樂,廣告配樂,數位製譜,音效,混音,日本,配樂,接案,電影,音效,歧嚮音樂,Dyverse,外包">
    <meta name="google-site-verification" content="LI2MMqM1b-QnvsS3EK9VGBcNOOI4pQCY-Am1PBYggmc">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
    <link rel="icon" type="image/png" href="/img/favicon.png" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/2.2.1/vuex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/2.3.1/vue-router.min.js"></script> -->
    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
      window.csrf_token = "{{ csrf_token() }}";
    </script>

</head>
<body>
    <App id="app"></App>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
