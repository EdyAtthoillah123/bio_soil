<?php
$conn = mysqli_connect("localhost","root", "", "bio_soil" );

if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpname = $_FILES["webcam"]["tmp_name"];
    $imagename = date("Y.m.d")." - ". date("h.i.sa").'jpeg';
    move_uploaded_file($tmpname, 'img/'.$imagename);
    $date = date("Y.m.d")." & ". date("h.i.sa");
    $query = "INSERT INTO tb_image values ('','$date','$imagename')";
    mysqli_query($conn, $query);
    return redirect('/')->with('success', "Image Uploaded Success");
}

?>