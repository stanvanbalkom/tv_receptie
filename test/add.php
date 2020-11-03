<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>TV Add page</title>
</head>
<body>
    <a href="index.php"><button class="btn btn-primary btn-lg btn-block">Home</button></a>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <h5 class="card-text text-center">Vul hier een link in</h5>
                            <input class="form-control" type="text" name="url"/>
                            <h5 class="card-text text-center"style="padding-top: 50px;">Vul het aantal seconds is</h5>
                            <input class="form-control" type="number" name="seconds1">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="submitUrl">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <h5 class="card-text text-center">Selecteer een afbeelding</h5>
                            <input class="form-control-file" type="file" name="image" accept="image/*" style="padding-bottom: 60px;"/>
                            <h5 class="card-text text-center">Vul het aantal seconds is</h5>
                            <input class="form-control" type="number" name="seconds2">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="submitImg">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

if(isset($_POST['image']) && isset($_POST['seconds2'])){

    $image = "test/".$_POST['image'];
    $seconds2 = $_POST['seconds2'];

    $fp = fopen('data.txt', 'a+');

    fwrite($fp, $image.",".$seconds2."#".PHP_EOL);
    fclose($fp);

} 

if(isset($_POST['url']) && isset($_POST['seconds1'])){

    $url = $_POST['url'];
    $seconds1 = $_POST['seconds1'];

    $fp = fopen('data.txt', 'a+');

    fwrite($fp, $url.",".$seconds1."#".PHP_EOL);
    fclose($fp);

}

?>