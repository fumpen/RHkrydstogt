<!DOCTYPE html>
<html lang="en">
<head>
  <title>MarBar</title>
  <meta charset="utf-8">
  <meta Http-Equiv="Cache-Control" Content="no-cache">
  <meta Http-Equiv="Pragma" Content="no-cache">
  <meta Http-Equiv="Expires" Content="0">
  <meta Http-Equiv="Pragma-directive: no-cache">
  <meta Http-Equiv="Cache-directive: no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="odometer/themes/odometer-theme-car.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="odometer/odometer.js"></script>
  <script>
    window.odometerOptions = {
        format: 'd'
    };
  </script>

</head>

<style>
    .odometer {
        font-size: 25px;
    }

    .points {
        text-align:center;
    }
    
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  
 .carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
  transition-duration: 1s;
  transition-timing-function:linear;
}

.carousel-fade .carousel-inner .active {
  opacity: 1;
}

.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}

.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}

.carousel-fade .carousel-control {
  z-index: 2;
}

.top-buffer {
    margin-top:100px;
}
    
</style>

<body>

<div class="points container-fluid">
    <div class="row">
        <div class="col-sm-1">
            <h1>1A</h1>
            <div id="1A" class="odometer">0</div>
        
            <h1>2A</h1>
            <div id="2A" class="odometer">0</div>
        
            <h1>3A</h1>
            <div id="3A" class="odometer">0</div>
        
            <h1>4A</h1>
            <div id="4A" class="odometer">0</div>
        
            <h1>5A</h1>
            <div id="5A" class="odometer">0</div>
        
            <h1>6A</h1>
            <div id="6A" class="odometer">0</div>
        
            <h1>7A</h1>
            <div id="7A" class="odometer">0</div>
        </div>
        
        <div class="col-sm-1">
            <h1>1B</h1>
            <div id="1B" class="odometer">0</div>
        
            <h1>2B</h1>
            <div id="2B" class="odometer">0</div>
        
            <h1>3B</h1>
            <div id="3B" class="odometer">0</div>
        
            <h1>4B</h1>
            <div id="4B" class="odometer">0</div>
        
            <h1>5B</h1>
            <div id="5B" class="odometer">0</div>
        
            <h1>6B</h1>
            <div id="6B" class="odometer">0</div>
        
            <h1>7B</h1>
            <div id="7B" class="odometer">0</div>
        </div>
        
        <div class="col-sm-8">
            <div class="row">
                <img src="images/Banner.png" style="width:800px;">
            </div>
            
            
            <div class="row">
                <div class="col-sm-6 container top-buffer" id="graphSlider">
                </div>
                
                <div class="col-sm-6 container top-buffer" id="instagramSlider">
                </div>
            </div>
            
            
            <div class="row top-buffer">
                <div class="col-sm-4">
                    <h1>Aspiranter</h1>
                    <div id="Aspiranter" class="odometer">0</div>
                </div>
                <div class="col-sm-4">
                    <h1>Crew</h1>
                    <div id="Crew" class="odometer">0</div>
                </div>
                <div class="col-sm-4">
                    <h1>Marbarudvalget</h1>
                    <div id="Marbarudvalget" class="odometer">0</div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-1">
            <h1>1C</h1>
            <div id="1C" class="odometer">0</div>
        
            <h1>2C</h1>
            <div id="2C" class="odometer">0</div>
        
            <h1>3C</h1>
            <div id="3C" class="odometer">0</div>
        
            <h1>4C</h1>
            <div id="4C" class="odometer">0</div>
        
            <h1>5C</h1>
            <div id="5C" class="odometer">0</div>
        
            <h1>6C</h1>
            <div id="6C" class="odometer">0</div>
        
            <h1>7C</h1>
            <div id="7C" class="odometer">0</div>
        </div>
        
        <div class="col-sm-1">
            <h1>1D</h1>
            <div id="1D" class="odometer">0</div>
        
            <h1>2D</h1>
            <div id="2D" class="odometer">0</div>
        
            <h1>3D</h1>
            <div id="3D" class="odometer">0</div>
        
            <h1>4D</h1>
            <div id="4D" class="odometer">0</div>
        
            <h1>5D</h1>
            <div id="5D" class="odometer">0</div>
        
            <h1>6D</h1>
            <div id="6D" class="odometer">0</div>
        
            <h1>7D</h1>
            <div id="7D" class="odometer">0</div>
        </div>
        
    </div>
</div>


<script id="source" language="javascript" type="text/javascript">
  $.ajaxSetup({cache: false});
  $( document ).ready(function() {
      graphCarousel();
      instagramCarousel();
      $.ajaxSetup({ cache: true });
  });

  function update() {
     $.ajax({                                      
                url: 'includes/get_points.php',                    
                data: "",                        
                dataType: 'json',                
                success: function(data) {
                    data.forEach(function(item) {
                        var kitchen = item[1];
                        var points = item[2];
                        document.getElementById(kitchen).innerHTML = points;
                    }
                    );
                } 
              }
              );
  }
  setInterval(update, 500);
  
  function graphCarousel(){
  
    $.ajax({                                      
             url: 'includes/get_images.php',                    
             data: "",                        
             dataType: 'json',                
             success: function(data) {
                var html = "<div id='graphCarousel' class='carousel slide carousel-fade'>";
                    html += "<div class='carousel-inner' role='listbox'>";
                
                var style = "style='width:500px;height:500px;'"
                var nocache = "?" + (new Date()).getTime();
                var i = true;
                data.forEach(function(image) {
                    var item = "";
                    
                    if(i) {
                        item += "<div class='item active'>"; 
                    } else {
                        item += "<div class='item'>"; 
                    }
                    item += "<img src='images/graphs/" + image + nocache + "' " + style + ">";
                    item += "</div>";
                    html += item;
                    i = false;
                });
                
                html += "</div>";
                html += "</div>";
                $('#graphCarousel').remove()
                $('#graphSlider').html(html);
                $('#graphCarousel').carousel({interval:3000});                
           
             }
          });
  }
  setInterval(graphCarousel, 10000);
  
  function instagramCarousel(){
    $.ajax({                                      
             url: 'includes/get_instagram_images.php',                    
             data: "",                        
             dataType: 'json',                
             success: function(data) {
                
                var html = "<div id='instagramCarousel' class='carousel slide carousel-fade'>";
                    html += "<div class='carousel-inner' role='listbox'>";
                
                var style = "style='width:500px;height:500px;'"
                var nocache = "?" + (new Date()).getTime();
                var i = true;
                data.forEach(function(image) {
                    if(image === null) { return; }
                    var item = "";
                    
                    if(i) {
                        item += "<div class='item active'>"; 
                    } else {
                        item += "<div class='item'>"; 
                    }
                    item += "<img src='" + image + nocache + "' " + style + ">";
                    item += "</div>";
                    html += item;
                    i = false;
                });
                
                html += "</div>";
                html += "</div>";
                
                $('#instagramSlider').html(html);
                $('#instagramCarousel').carousel({interval:3000});                
           
             }
          });
  }
  setInterval(instagramCarousel, 10000);
  
</script>

</body>
</html>

