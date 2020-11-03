<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>TV Edit page</title>
</head>
<?php 

    $datafile = "data.txt";

    $data = file_get_contents($datafile);
    $data = str_replace(array("\n", "\r"), '', $data);
    $data = explode("#",$data);

    unset($data[count($data) - 1]);

    $final_array = array();
    foreach ($data AS $row) {
        $final_array[] = explode(',',$row);
    }

    //print_r($final_array);

?>
<body>
    <a href="index.php"><button class="btn btn-primary btn-lg btn-block">Home</button></a>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <td>Link</td>
                            <td>Secondes</td>
                        </tr>
                    </thead>
                    <?php 
                    while (!feof($data)) {
                        $data = fgets($data);
                        
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-12 offset-md-3 col-md-6">
                <form method="post">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="submitUrl" disabled>
                </form>
            </div>
        </div>
    </div>
</body>
</html>