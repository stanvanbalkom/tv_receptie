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

$sum = 0;
foreach ($final_array as $num => $value) {
	$sum += $value[1];
}

?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="refresh" content="<?php echo $sum; ?>">
		<title>Sencio TV</title>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script type="text/javascript">

			firstTime = true;

			function rotateImage(){
				
				var rotationTime = <?php echo json_encode($final_array); ?>;
				imageCount = rotationTime.length;
				
				if (document.getElementById('rotatingImage') || firstTime){
					if (firstTime) {	
						thisImage = 0
						firstTime = false
					}else{
						thisImage++
						if (thisImage == imageCount) {
							thisImage = 0
						}
					}
					var link = rotationTime[thisImage][0];
					var linkSubStr = link.substr(link.length - 3);

					var delayTime = rotationTime[thisImage][1]*1000;

					if (linkSubStr == "jpg" || linkSubStr == "png" || linkSubStr == "peg") {
						$("#slideshow").remove("iframe");
						$("#slideshow").hide().html('<img id="rotatingImage" src="" />');
						$("#slideshow").fadeIn(1500).delay(delayTime - 3000).fadeOut(1500);
					}
					else{
						$("#slideshow").remove("img");
						$("#slideshow").hide().html('<iframe frameBorder="0" id="rotatingImage" src=""></iframe>');
						$("#slideshow").fadeIn(1500).delay(delayTime - 3000).fadeOut(1500);
					}
					document.getElementById('rotatingImage').src = rotationTime[thisImage][0];
					setTimeout("rotateImage()", rotationTime[thisImage][1]* 1000);	
				}
			}
				
		</script>
		<style type="text/css">
            body{
                margin:0;
				background-color:black;
            }
            #slideshow{
				width:100vw;
				height:100vh;

			}
			#rotatingImage{
				display: block;
    			width: 100vw;
    			height: 100vh;

			}
			img{
				height: 100%;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div id="slideshow">
			<!-- <iframe frameBorder="0" id="rotatingImage" src=""></iframe> -->
            <img id="rotatingImage" src="" />
		</div>
		<script type="text/javascript">
			rotateImage();
		</script>
		
	</body>
</html>
