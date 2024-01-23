// public/js/script.js

$(document).ready(function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const apiKey = "eee3ccd9ce594c7bb3b93338242201"; // Get API key from a hidden input in the view
            const additionalData = {
                param1: 'value1',
                param2: 'value2'
                // Add any other data you want to send to the controller
            };

            fetchWeatherData(apiKey, latitude, longitude, additionalData);
        }, function (error) {
            displayError('Error getting location: ' + error.message);
        });
    } else {
        displayError('Geolocation is not supported by your browser.');
    }

    function fetchWeatherData(apiKey, latitude, longitude, additionalData) {
        $.ajax({
            url: '/get-weather-data',
            method: 'POST',
            data: {
                apiKey: apiKey,
                latitude: latitude,
                longitude: longitude,
                additionalData: additionalData
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === 'success') {
                    displayWeather(response.data);
                } else {
                    displayError('Error fetching weather data');
                }
            },
            error: function (error) {
                displayError('Error fetching weather data');
            }
        });
    }

    function displayWeather(data) {
        var imageUrl = data.current.condition.icon;
        // Create an image element using jQuery
        var imageElement = $('<img>').attr('src', imageUrl).attr('alt', 'Image');
           
        $('#location').text('Location: ' + data.location.name + ', '+ data.location.region +', ' + data.location.country);
        $('#temperature').text('Temperature: ' + data.current.temp_c + ' °C');
        $('#condition-icon').append(imageElement);
        $('#condition').text('Condition: ' + data.current.condition.text);
        $('#percipitaion').text('Percipitaion: ' + data.current.precip_in + ' %');
        $('#humidity').text('Humidity: ' + data.current.humidity + ' %');
        $('#wind').text('Wind: ' + data.current.wind_mph + ' km/h');
    }

    function displayError(message) {
        $('#error-message').text(message);
    }
});

