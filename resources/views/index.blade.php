<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
    <title>{{ __('msg.title') }}</title>
</head>

<body>

    <nav>
        <div class="rectangle"></div>
        <h3>COVID 19<span id='cvd'>{{ __('msg.morocco') }}</span></h3>
        <ul>
            <li class="active"><a class="m-text" href="/{{App::getLocale()}}">{{ __('msg.home') }}</a></li>
            <li><a class="m-text" href="{{App::getLocale()}}/statistics">{{ __('msg.statistics') }}</a></li>
            <li><a class="m-text" href="about.html">{{ __('msg.what') }}</a></li>
            <li><a  class="m-text" href="tweets.html">{{ __('msg.tweets') }}</a></li>
        </ul>
        <div class="select">
            <select name="slct" id="slct">
                <option id="en" value="en">EN</option>
                <option id="ar" value="ar">AR</option>
                <option id="fr" value="fr">FR</option>
            </select>
        </div>
    </nav>
    <main>
        <div class="main">
            <div class="text">
                <h3 class="m-text" id='stay'>{{ __('msg.stay_home') }}</h3>
                <h3 class="m-text" id='safe'>{{ __('msg.stay_safe') }}</h3>
            </div>
            <div class="button" id="button">
                <a class="m-text" href="{{App::getLocale()}}/statistics">{{ __('msg.show') }}</a>
            </div>
        </div>
    </main>
</body>
@php
$lg= App::getLocale();
@endphp
<script>
switch('<?php echo $lg ?>'){
    case 'en': document.getElementById('en').setAttribute('selected','selected');break;
    case 'fr': document.getElementById('fr').setAttribute('selected','selected');break;
    case 'ar': document.getElementById('ar').setAttribute('selected','selected');
   all = document.getElementsByClassName('m-text');
   for(i=0;i<all.length;i++){
    all[i].style.fontFamily=' Tajawal , sans-serif';
   }
   document.getElementById('button').setAttribute('style','margin-top:25px;')
    break;
}
$("#slct").change(function(){
    if($(this).val()=="en"){
        window.location.href='/en';
    }
    else if($(this).val()=="fr"){
        window.location.href='/fr';
    }else{
        window.location.href='/ar';
    }
});
</script>

</html>