<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="temperatureconverter.css">
    <title>Temperature Converter</title>
</head>
<body>

<h2>Temperature Converter</h2>
<div class="container">
<form method="post" action="">
    <label class="title2" for="temperature">Enter the temperature value:</label>
    <input type="text" name="temperature" required>

    <label class="title3" for="unit">Select the original unit of measurement:</label>

    <select name="unit" required>
        <option value="C">Celsius</option>
        <option value="F">Fahrenheit</option>
        <option value="K">Kelvin</option>
    </select>


    <input type="submit" value="Convert">
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperature = floatval($_POST["temperature"]);
    $originalUnit = strtoupper($_POST["unit"]);

    switch ($originalUnit) {
        case 'C':
            $fahrenheit = celsiusToFahrenheit($temperature);
            $kelvin = celsiusToKelvin($temperature);
            echo "{$temperature} degrees Celsius is equal to {$fahrenheit} degrees Fahrenheit and {$kelvin} Kelvin.";
            break;
        case 'F':
            $celsius = fahrenheitToCelsius($temperature);
            $kelvin = fahrenheitToKelvin($temperature);
            echo "{$temperature} degrees Fahrenheit is equal to {$celsius} degrees Celsius and {$kelvin} Kelvin.";
            break;
        case 'K':
            $celsius = kelvinToCelsius($temperature);
            $fahrenheit = kelvinToFahrenheit($temperature);
            echo "{$temperature} Kelvin is equal to {$celsius} degrees Celsius and {$fahrenheit} degrees Fahrenheit.";
            break;
        default:
            echo "Invalid unit of measurement. Please enter C, F, or K.";
    }
}

function celsiusToFahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}

function celsiusToKelvin($celsius) {
    return $celsius + 273.15;
}

function fahrenheitToCelsius($fahrenheit) {
    return ($fahrenheit - 32) * 5/9;
}

function fahrenheitToKelvin($fahrenheit) {
    return ($fahrenheit - 32) * 5/9 + 273.15;
}

function kelvinToCelsius($kelvin) {
    return $kelvin - 273.15;
}

function kelvinToFahrenheit($kelvin) {
    return ($kelvin - 273.15) * 9/5 + 32;
}
?>
</div>
</body>
</html>