<!DOCTYPE html>
<html>
    @extends('layouts.app')

    

 <script>

let reqURL = 'http://api.openweathermap.org/data/2.5/weather?q=Singapore&units=metric&APPID=1e4c16a27f10412f1fb8ac3bc1b56d46'
let request = new XMLHttpRequest(); 
request.open('GET', reqURL);
request.responseType = 'json';
request.send();
request.onload = function() { 
$weather = request.response.weather
$temperature =request.response.main.temp

  //alert(JSON.stringify($temperature.temp));
 
 // to send weather info to welcome page
document.getElementById("weather").innerHTML = ($weather[0].description);
document.getElementById("image").src = "http://openweathermap.org/img/wn/"+($weather[0].icon)+".png";
document.getElementById("temperature").innerHTML = "Temperature : "+ ($temperature)+"°C";
}
</script>

    <body>
        <?php include("navbar.php"); ?>

        <div class = "container">
            <div class = "row">
                <div class = "col-3" id="pname">
                <br>
                    <h2>Cycling Routes</h2>
                    <br>
                    @foreach ($players as $player)
                        <h4> <a href='/{{$player->PlayerName}}'>{{$player->PlayerName}}</a></h4>
                    @endforeach
                </div>
                <div class = "col-4">
                    @if(@isset($name))
                    <br>
                    <h2>{{$name}}</h2><br>
                    <h5>Distance: {{$desc->Distance}} Km</h5><br>
                    <p>{{$desc->Description}}<br></p>
                    @else
                    <br>
                    <h2>Select or add a Route !</h2>
                   <h5> Current Weather in Singapore :
                    <br> <br><p id="weather"></p>
                    <img id="image" src="http://openweathermap.org/img/wn/02d.png">
                    <p id="temperature"></p>

                    @endif
                </div>
                <div class = "col-5" id="picpic">
                    @if(@isset($name))
                    <form method= "post" action ="{{route('deletePlayer')}}">
                        @csrf
                        <div class="btns">
                        <input type="button" value="Hide Photo" id="hidebtn" onclick="changeVis()">
                        {{-- <input type="submit" name="delete" value="Delete Route"> --}}
                        </div>
                        <img id="hide" src="{{asset('uploads/player/' . $desc->Image)}}" alt="Image" height="300">
                        <textarea style="visibility: hidden;" name="nameDEL">{{$name}}</textarea>
                    </form>
                    @else
                    
                    @endif
                </div> 
            </div>
        </div>

        <script type="text/javascript">
            function changeVis() {
               document.getElementById("hide").style.visibility = "hidden";
               document.getElementById("hidebtn").value = "Show Photo";
                document.getElementById("hidebtn").onclick = function() { swapVis(); };
            }

         function swapVis() {
             document.getElementById("hide").style.visibility = "visible";
                document.getElementById("hidebtn").value = "Hide Photo";
                document.getElementById("hidebtn").onclick = function() { changeVis(); };
             }
            
           // var show = true;
            {{-- $(document).ready(function(){
                if(show){
                  $("input").click(function(){
                    $("img").toggle();
                    document.getElementById("hidebtn").value = "Show Pic";
                    var show = false;
                  });
                }else{
                    $("input").click(function(){
                    $("img").toggle();
                    document.getElementById("hidebtn").value = "Hide Pic";
                    var show = true;
                  });
                }
            }); --}}

        </script>
<br>
<br>
        <img id="cycle" src="/images/cycle.png">


  <script>
    //cycle.onmouseover = function() 
    window.onload = function() {
      let start = Date.now();

      let timer = setInterval(function() {
        let timePassed = Date.now() - start;

        cycle.style.left = timePassed / 5 + 'px';

        if (timePassed > 5500) clearInterval(timer);
        }, 10);
    }




  </script>

  

    </body>
</html>


