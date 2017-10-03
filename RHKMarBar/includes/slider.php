<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body>

<div class="container" id="test">

</div>

<script>

$( document ).ready(function() {
    updateCarousel();
});

function updateCarousel(){
    $.ajax({                                      
             url: 'get_images.php',                    
             data: "",                        
             dataType: 'json',                
             success: function(data) {
                var html = "<div id='myCarousel' class='carousel'>";
                    html += "<div class='carousel-inner' role='listbox'>";
                
                var style = "style='width:400px;height:400px;'"
                var i = true;
                data.forEach(function(image) {
                    var item = "";
                    
                    if(i) {
                        item += "<div class='item active'>"; 
                    } else {
                        item += "<div class='item'>"; 
                    }
                    item += "<img src='../images/graphs/" + image + "' " + style + ">";
                    item += "</div>";
                    html += item;
                    i = false;
                });
                
                html += "</div>";
                html += "</div>";
                
                $("#test").html(html);
                $('#myCarousel').carousel({interval:1000});                
           
             }
          });
}
setInterval(updateCarousel, 5000);


</script>

</body>
</html>

