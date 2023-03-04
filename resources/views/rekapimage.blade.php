
<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border = 1 cellspacing = 0 cellpadding = 10>
        <tr>
            <td>#</td>
            <td>Date & Time</td>
            <td>Image</td>
        </tr>
        <?php
        $i = 1;
        $row = mysqli_query($conn, 'SELECT * FROM tb_image ORDER BY id DESC');
        foreach ($row as $rows) : 
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $rows['date']; ?></td>
            <td><img src="img/<?php echo $rows["image"]; ?>" width="200"  alt=""></td>
        </tr>
        <?php  endforeach; ?>
    </table>
    <button class="btn btn-primary"><a href="/">Kembali</a></button>
</body>
</html>