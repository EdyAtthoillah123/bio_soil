@if (session('success'))
<strong>
    {{ session('success') }}
</strong>
    
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="configure();">
    <div class="container">
        <div id="my_camera">
           
        </div>
        <div id="results" style="visibility: hidden; position: absolute;">
        
        </div>
        <br>
        <button type="button" onclick= "saveSnap();">Save</button> <br>
        <a href="/rekapimage"><button type="button" name="button">Database Image</button></a>
    </div>
    
    <script type="text/javascript" src="assets/webcam.min.js">
    </script>
    <script type="text/javascript"> 
    function configure(){
        Webcam.set({
            width: 480,
            height: 360,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    }

    function saveSnap(){
       Webcam.snap(function(data_uri){
        document.getElementById('results').innerHTML =
        '<img id = "webcam" src ="'+data_uri+'">';
        
       }); 
       Webcam.reset();

       var base64image = document.getElementById("webcam").src;
       Webcam.upload(base64image,'function.php',function(code,text){
        alert('Save Successfully');
        document.location.href = "/"
       });
    }
    </script>
    <style>
        .content{
            padding-top: 10px;
        }
    </style>
    <div class="content">
    
    </div>
    
    <br>
</body>
</html>


<form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
@csrf
Upload Image: <input type="file" src="img/" name="profile_image"/>
<p><button type="submit" class="btn btn-default">Submit</button></p>
</form>







