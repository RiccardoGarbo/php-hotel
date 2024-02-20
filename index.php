<?php
include 'data.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Font Awesome-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' integrity='sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==' crossorigin='anonymous'/>
    <!--Bootstrap-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
</head>
<body class="container" > 
<form action="" method="GET">
        <div class="mb-3">
            <label for="parkingFilter" class="form-label">Filtra per parcheggio:</label>
            <input type="checkbox" name="parking" value="1" <?php if(isset($_GET['parking']) && $_GET['parking'] === true) ; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Filtra</button>
    </form>        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as  $hotel) : ?>   
                    <?php if(isset($_GET['parking']) && $_GET['parking'] === '1' && !$hotel['parking']) continue ?>   
                    <?php if($hotel['parking'] === true ) : ?> 
                       <?php $hotel['parking'] = '<i class="fa-solid fa-circle-check"></i>'?>
                    <?php else: ?>
                    <?php $hotel['parking'] = '<i class="fa-solid fa-circle-xmark"></i>'
                    ?>
                    <?php endif; ?>
                    <tr>     
                        <td><?= $hotel['name'] ?></td>
                        <td><?= $hotel['description'] ?></td>
                        <td><?= $hotel['parking'] ?></td>
                        <td><?= $hotel['vote'] ?></td>   
                        <td><?= $hotel['distance_to_center'] ?></td>   
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>
</html>