 <?php
session_start();
require "vendor/autoload.php";

use Google\Cloud\Vision\Image;
    use Google\Cloud\Vision\VisionClient;

     $imageResource = fopen($_FILES['image']['tmp_name'], 'r');

     $thePic = new Image($imageResource, [
        
           'DOCUMENT_TEXT_DETECTION'
      ], [
          'maxResults' => [
             
              'DOCUMENT_TEXT_DETECTION' => 50
          ],
          'imageContext' => []
      ]);


     $vision = new VisionClient(['keyFile' => json_decode(file_get_contents("vision.json"),true)]);
     $result = $vision->annotate($thePic);
     // var_dump($result);
    $finalLabels = array();

     

     if($result){
     	$imagetoken = random_int(1111111,999999999);
     	move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ .'/feed/' . $imagetoken . ".jpg");
     }
     else{
     	header("location : index.php");
     	die(); 
     }
     if($result->text()){
         foreach ($result->text() as $key => $annonObj) {
             $tmp = $annonObj->info();
            $finalLabels[] = $tmp['description'];
         }  
         // echo($finalLabels[0]); 
     }

 $text = $finalLabels[0];

?>



<!DOCTYPE html>
<html>
<head>
	<title>Google Cloud Vision API</title>
	 <link rel="stylesheet" href="bootstrap/css/css/bootstrap.min.css">
</head>
<style>
* {
  box-sizing: border-box; 
}

body {
  background: #444;
  background-size: 100%;
  color: #fff;
  height: 100%;
  margin: 0;
   
}
  
body#bg-img{
    background: url(images/background.jpg) no-repeat top center fixed;
    
}
 body .main {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: rgba(68, 68, 68, 0.9); 
}


  .panel-heading .main-heading1{
  	color: yellow;
  	text-align: center;
  	font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   
  }
  .panel-heading .main-heading1 .main-heading2{
  	color: white;
  	text-align: center;
  	font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  
  }
.panel-heading .main-heading1 .main-heading3{
  	color: white;
  	text-align: center;
  	font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   
  }

  .description{
  	text-align: center;
  	font-style: italic;
  }

  .btn-submit{
  	border-radius: 0px;
  	color: #aaa;
  }

</style>
<body id="bg-img" >
	<div class="main">	
	<div class="container-fluid" style="max-width: 1080px;">
		<br><br><br>
		<div class="row" id="home">
			<div class="col-md-12" style="background: #444;padding: 20px;box-shadow: 10px 10px 5px #888;">
				<div class="panel-heading">
					<h2 class="main-heading1">Google <span class="main-heading2">Cloud </span>Vision <span class="main-heading3">API</span></h2>
					<p class="description">Handwritten Image Processing</p>
				</div>
				

				<hr>	
				<div class="row col-md-12">
					
					<table border="1" bordercolor="#aaa" align="center" cellspacing="10" class="col-md-12">
        
        <tr>
            <th style="text-align: center;">Image</th>
           
            <th style="text-align: center;">Analysed Text</th>
        </tr>
        <tr>
            
            
                    <!-- considering it is on the same folder that .html file -->
            <td style="text-align: center;"><img class="img-thumbnail" src="<?php 
                if($text !=null){
                 echo "/feed/" . $imagetoken . ".jpg";
                }
            ?>" alt="Analysed Image">
              </td>
            <td style="text-align: center;"><?php echo $text;?></td>
          
        </tr>
				</div>	
			</div>
		</div>
		
	</div>
</div>
</body>
</html>
