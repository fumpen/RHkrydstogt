<!DOCTYPE html>
<html lang="en">
<head>
  <title>MarBar Interface</title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>

<style>
.top-buffer {
    margin-top:40px;
}

.btn-block {
    height: 70px;
    margin: 10px;
}

.form-control{
    margin: 10px;
    height: 70px; 
}
</style>

<body>


<form action="update.php" method="post" class="ajax">
    <div class=container-fluid">
        <div class="row">
            <div class=col-sm-4>
                <div class="form-group">
                    <input type="hidden" id="kitchen" name="kitchen">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="streger" name="streger" placeholder="streger">
                </div>
            </div>
        </div>
   
    
    
        <div class="row">
            <div class="col-sm-1">
                <input type="button" value="1A" class="kbutton btn btn-default btn-lg btn-block">
                <input type="button" value="2A" class="kbutton btn btn-default btn-lg btn-block">
                <input type="button" value="3A" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="4A" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="5A" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="6A" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="7A" class="kbutton btn btn-default btn-lg btn-block"">
            </div>  
            <div class="col-sm-1">
                <input type="button" value="1B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="2B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="3B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="4B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="5B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="6B" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="7B" class="kbutton btn btn-default btn-lg btn-block"">
            </div>
            <div class="col-sm-1">
                <input type="button" value="1C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="2C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="3C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="4C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="5C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="6C" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="7C" class="kbutton btn btn-default btn-lg btn-block"">
            </div>
            <div class="col-sm-1">
                <input type="button" value="1D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="2D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="3D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="4D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="5D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="6D" class="kbutton btn btn-default btn-lg btn-block"">
                <input type="button" value="7D" class="kbutton btn btn-default btn-lg btn-block"">
            </div>
        </div>
        <div class="row top-buffer">
            <div class="col-sm-1">
                <input type="button" value="Aspiranter" class="kbutton btn btn-default btn-lg btn-block">
            </div>
            <div class="col-sm-1">
                <input type="button" value="Crew" class="kbutton btn btn-default btn-lg btn-block">
            </div>
            <div class="col-sm-2">
                <input type="button" value="Marbarudvalget" class="kbutton btn btn-default btn-lg btn-block">
            </div>
        
    </div>
</form>

<script>

$(document).ready(function() {
    $(".kbutton").click(function(e) {
        
        var val = $(this).val()
        $("#kitchen").val(val);
        
        var url = "includes/update.php";
        var type = "post";
        var data = {};
    
        data['streger'] = $("#streger").val();
        data['kitchen'] = $("#kitchen").val();

        console.log(data);

        $.ajax({url: url, type: type, data: data});
        
        $("#ajax").submit();
        $("#kitchen").val("");
        $("#streger").val(0);
});
});

</script>

</body>

</html>
