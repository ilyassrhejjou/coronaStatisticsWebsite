<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
    <title>{{ __('msg.titleS') }}</title>
</head>
@php
$lg= App::getLocale();
@endphp
<script>
var label='Confirmed cases';
    switch('<?php echo $lg ?>'){
        case 'fr':  label='Les cas confirmés'; var fontFamily = 'Roboto'; break;
        case 'ar':  label='الحالات المؤكدة'; var fontFamily='Tajawal'; break;
        case 'en': label = 'Confirmed cases'; var fontFamily = 'Roboto'; break;
    }
    
</script>

<body>
    <nav id="menu">
        <div class="rectangle"></div>
        <h3>COVID 19<span id='cvd'> {{ __('msg.morocco') }}</span></h3>
        <ul>
            <li><a class="m-text" href="/{{App::getLocale()}}">{{ __('msg.home') }}</a></li>
            <li class="active"><a class="m-text" href="statistics">{{ __('msg.statistics') }}</a></li>
            <li><a class="m-text" href="about.html">{{ __('msg.what') }}</a></li>
            <li><a class="m-text" href="tweets.html">{{ __('msg.tweets') }}</a></li>
        </ul>
        <div class="select">
            <select name="slct" id="slct">
                <option id='en' value="en">EN</option>
                <option id='ar' value="ar">AR</option>
                <option id='fr' value="fr">FR</option>
            </select>
        </div>
    </nav>

    <main>
        <div class="rec"></div>
        <div class="bk"></div>
        <div class="box1">
            <div class="country">
                <div class="morocco"><img src="{{ asset('img/morocco.png') }}" alt=""></div>
                <h3 class="m-text">{{ __('msg.overview') }}</h3>
            </div>
            <div class="flex-me">
                <div class="confirmed m-text">
                    <h3 class="number" id="number_confirmed"></h3>
                    <h3 class="texts">{{ __('msg.confirmed') }}</h3>
                    <p>+<span class="number" id="new_cases"></span> {{ __('msg.newC') }}</p>
                </div>
                <div class="recovred m-text">
                    <h3 class="number" id="number_recovred"></h3>
                    <h3 class="texts">{{ __('msg.recovered') }}</h3>
                </div>
                <div class="deaths m-text">
                    <h3 class="number" id="number_deaths"></h3>
                    <h3 class="texts">{{ __('msg.deaths') }}</h3>
                    <p>+<span class="number" id="new_deaths"></span> {{ __('msg.newD') }}</p>
                </div>
                <div class="active-cases m-text">
                    <h3 class="number" id="number_active"></h3>
                    <h3 class="texts">{{ __('msg.active') }}</h3>
                </div>
                <div class="serious-cases m-text">
                    <h3 class="number" id="number_serious"></h3>
                    <h3 class="texts">{{ __('msg.serious') }}</h3>
                </div>
            </div>
        </div>

        <div class="box2">
            <h3 class="m-text">{{ __('msg.chart') }}</h3>
            <canvas id='chart' width="1000" height="300"></canvas>
        </div>
    </main>
</body>
<script>
switch('<?php echo $lg ?>'){
    case 'en': document.getElementById('en').setAttribute('selected','selected');break;
    case 'fr': document.getElementById('fr').setAttribute('selected','selected');break;
    case 'ar': document.getElementById('ar').setAttribute('selected','selected');
    all = document.getElementsByClassName('m-text');
   for(i=0;i<all.length;i++){
    all[i].style.fontFamily=' Tajawal , sans-serif';
   }
    break;
}
$("#slct").change(function(){
    if($(this).val()=="en"){
        window.location.href='/en/statistics';
    }
    else if($(this).val()=="fr"){
        window.location.href='/fr/statistics';
    }else{
        window.location.href='/ar/statistics';
    }
});
</script>
<script src="{{asset('js/script.js')}}"></script>

</html>