<?php
require 'connection.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO td_data VALUES('','$name','$email','$latitude','$longitude')";
    mysqli_query($conn, $query);

    echo "
    <script>
    alert('sucesso');
    document.location.href = 'data.php';
    </script>
    "
    ;
}
?>

<!-- pegar latitude e longitude javascript 
https://www.abstractapi.com/a/ip-geolocation-api?utm_source=google&utm_medium=cpc&utm_campaign=ip_geo&gclid=EAIaIQobChMIrfLLsNeMggMVWwytBh3CDA27EAAYASAAEgIKTPD_BwE
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" class="myForm" method="post" autocomplete="off">
        <label for="">Name</label>
        <input type="text" name="name" requiered value=""> <br>
        <label for="">Email</label>
        <input type="email" name="email" requiered value=""> <br>
        <input type="text" name="latitude"  value="">
        <input type="text" name="longitude"  value=""> <br>
        <button type="submit" name="submit">submit</button>
    </form>
    
    <script type="text/javascript">
        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            }
        }
        function showPosition(position){
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }
        function showError(erro){
            switch(error.code){
                case error.PERMISSON_DENIED;
                alert("Teste erro");
                location.reload();
                break;
            }
        }
        
    </script>
</body>
</html>