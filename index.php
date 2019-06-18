<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Godzilla Web Interface</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style>
        * {
            background-color: black;
        }
        body {
            display: flex;
            justify-content: center;
        }
        h1 {
            color: white;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 72px;
        }
        form {
            display: none;
        }
        section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 150px;
        }
        #commands p {
            margin-top: -20px;
            margin-bottom: 15px;
            font-family: 'Roboto Condensed', sans-serif;
            color: white;
        }
        #modes {
            display:flex;
            justify-content: space-around;
        }
        #modes div {
            padding: 4px;
            font-family: 'Roboto Condensed', sans-serif;
            color: white;
            border-style: solid;
            border-color: white;
            background-color: black;
        }

        #modes div:hover {
            color: black;
            background-color: white;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body onkeypress="keyPress(event)"> <!-- This will trigger the JavaScript function keyPress() when any key is pressed-->
<section>
    <div id="title">
        <h1>G O D Z I L L A</h1>
    </div>
    <div id="commands">
        <p>
            W - forward  |  A - left  |  D - right  |  L - back  |  space - stop  |  Enter - super
        </p>
    </div>
    <div id="modes">
        <div id="line" onclick="line()">Line Following</div>
        <div id="sumo" onclick="sumo()">Sumo Mode</div>
    </div>
    <form method="get" action="">
        <button type="submit" id="forward" value="FORWARD" name="forward"></button>
        <button type="submit" id="left" value="LEFT" name="left"></button>
        <button type="submit" id="right" value="RIGHT" name="right"></button>
        <button type="submit" id="stop" value="STOP" name="stop"></button>
        <button type="submit" id="reverse" value="REVERSE" name="reverse"></button>
        <button type="submit" id="max" value="MAX" name="max"></button>
        <button type="submit" id="line-following" value="LINE" name="line"></button>
        <button type="submit" id="sumo-battle" value="SUMO" name="sumo"></button>
    </form>
</section>

<?php
    //The first thing was to set the pins connected to the Servo's in writable mode.
    shell_exec("pigs m 16 w");
    shell_exec("pigs m 6 w");

    /**
     * The pulse width send to the Servos varies from 1000 to 2000, being 1500 the middle.
     * A 1500 pulse width will make the Servos stop.
     * A servo turns clockwise (16) and the other anti-clockwise (6).
     * In order for the first one to go forwards, the pulse width should be 1500-200.
     * In order for the second one to go forwards, the pulse width should be 1000-1500.
    */

    if(isset($_GET["forward"])) {
        // When the program finds the name "forward" on the GET request, it executes this
        shell_exec("pigs SERVO 6 1300");
	    shell_exec("pigs SERVO 16 1800");
    }

    if(isset($_GET["left"])) {
        // When the program finds the name "left" on the GET request, it executes this
	    shell_exec("pigs SERVO 16 1500");
	    shell_exec("pigs SERVO 6 1300");
    }

    if(isset($_GET["right"])) {
        // When the program finds the name "right" on the GET request, it executes this
	    shell_exec("pigs SERVO 16 1800");
	    shell_exec("pigs SERVO 6 1500");
    }

    if(isset($_GET["stop"])) {
	    shell_exec("pigs SERVO 16 1500");
        shell_exec("pigs SERVO 6 1500");
    }

    if(isset($_GET["reverse"])) {
	    shell_exec("pigs SERVO 16 1300");
	    shell_exec("pigs SERVO 6 1800");
    }

    if(isset($_GET["max"])) {
	    shell_exec("pigs SERVO 16 2000");
	    shell_exec("pigs SERVO 6 1000");
    }

    if(isset($_GET["line"])) {
        // When the program finds the name "line" on the GET request, it runs the file
        shell_exec("python3 /home/pi/test3.py");
    }

    if(isset($_GET["sumo"])) {
        // When the program finds the name "sumo" on the GET request, it runs the file
        shell_exec("python3 /var/www/html/sumo-mode.py");
    }
?>
<script>
    // The function keyPress is called on the <body> tag with the event "onkeypress"
    // It receives the argument 'e', which is the event (a key pressed).
    function keyPress(e) {
        $(document).keypress(function(e) {
            // Browsers call this variable 'keyCode' or 'which', so both are considered
    	    var keycode = (e.keyCode ? e.keyCode : e.which);

    	    // If the space bar (32) is pressed
	        if(keycode == "32") {
	            // Button "stop" on the form is clicked
	            $("#stop").click();
	        }

	        // If "D" (97) is pressed
	        if(keycode == "97") {
		        $("#left").click();
	        }

	        // If "A" (100) is pressed
	        if(keycode == "100") {
		        $("#right").click();
	        }

	        // If "W" (119) is pressed
            if(keycode == "119") {
		        $("#forward").click();
	        }

            // If "L" (108) is pressed
            if(keycode == "108") {
		        $("#reverse").click();
	        }

            // If "Enter" (13) is pressed
            if(keycode == "13") {
		        $("#max").click();
	        }

            // In order to check the right keycodes, I logged them in the console
            console.log(keycode);
        });
    }

    function line() {
        $("#line-following").click();
    }

    function sumo() {
        $("#sumo-battle").click();
    }
</script>
</body>
</html>
