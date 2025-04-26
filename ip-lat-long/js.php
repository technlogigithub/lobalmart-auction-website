<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button id="measure">measure1</button>

<button id="start">start</button>

<button id="stop">stop</button>

<p id="demo">x</p>
<p id="demo2">y</p>

<input type="text" id="demo3">reference accuracy <br>
<input type="text" id="demo4">last accuracy <br>
<P id="demo5"></p> 
<script>
var x = document.getElementById("demo");
var y = document.getElementById("demo2");
var z = document.getElementById("demo3");
var q = document.getElementById("demo4");
var q2 = document.getElementById("demo5");


        document.getElementById("measure").onclick = getLocation;

        document.getElementById("start").onclick = clockStart;  
        document.getElementById("stop").onclick = clockStop;    

        var timerId // current timer if started

        function clockStart() {  
          if (timerId) return
          getLocation()
          timerId = setInterval(getCorrection, 2000)

        }

        function clockStop() {
          clearInterval(timerId)
          timerId = null
        }


  function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError, {enableHighAccuracy: true});
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            } 
        }


   function getCorrection() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition2, showError, {enableHighAccuracy: true});
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            } 
        }       

        function showPosition(position) {   


                x.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude +
                    "<br>Accuracy: " + position.coords.accuracy +
                    "<br>Speed: " + position.coords.speed + " m/s" +
                    "<br>Altitude: " + position.coords.altitude +
                    "<br>altitudeAccuracy: " + position.coords.altitudeAccuracy +
                    "<br>Headin: " + position.coords.heading +
                    "<br>Timestamp: " + position.timestamp  ;

                z.value = position.coords.accuracy;


        }

          function showPosition2(position) {   


                y.innerHTML = "Latitude: " + position.coords.latitude +
                    "<br>Longitude: " + position.coords.longitude +
                    "<br>Accuracy: " + position.coords.accuracy +
                    "<br>Speed: " + position.coords.speed + " m/s" +
                    "<br>Altitude: " + position.coords.altitude +
                    "<br>altitudeAccuracy: " + position.coords.altitudeAccuracy +
                    "<br>Headin: " + position.coords.heading +
                    "<br>Timestamp: " + position.timestamp  ;
           //     window.document.body.onload = showPosition;  
                q.value = position.coords.accuracy;



            if ( z.value > q.value){z.value = position.coords.accuracy; 
                                    q2.innerHTML = position.coords.accuracy + " " +  position.coords.latitude + ' ' + position.coords.longitude + " the best accurancy with positon";
                                    console.log('better')}


            else (z.value < q.value); { console.log('worse')}
        }


        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "Uşytkownik nie zezwolił na geolokalizację?"
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Informacja o lokalizacji jest niedostępna"
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "Przekroczono czas zapytania"
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "Wystąpił nieznany błąd"

            }
        }



</script>

</body>
</html>