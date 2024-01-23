<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/weather-icons/css/weather-icons.min.css">
    <title>Weather App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="weather-container">
        <h1>Weather forecast</h1>
        <div id="weather-data">
            <p id="location"></p>
            <div class="split left">
                <div class="centered">
                    <p id="temperature"></p>
                </div>
            </div>
            <p id="condition"></p>
        </div>
    
        <div id="weather-info" style="margin-top: -196px;float:right;">
            <p id="condition-icon"></p>
            <p id="percipitaion"></p>
            <p id="humidity"></p>
            <p id="wind"></p>
        </div>
        <p id="error-message"></p>
    </div>

    <input type="hidden" id="apiKey" value="{{ $apiKey }}">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
