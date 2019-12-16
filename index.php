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
	<div class="container">
		<br><br><br>
		<div class="row" id="home">
			<div class="col-md-12" style="background: #444;padding: 20px;box-shadow: 10px 10px 5px #aaa;">
				<div class="panel-heading">
					<h2 class="main-heading1">Google <span class="main-heading2">Cloud </span>Vision <span class="main-heading3">API</span></h2>
					<p class="description">Handwritten Image Processing</p>
				</div>
				

				<hr>	
				<form action="check.php" method="post" enctype="multipart/form-data">
					<input type="file" name="image" accept="image/*" class="form-control" >
					<br>	
					<button type="submit" class="btn btn-lg btn-block btn-outline-success btn-submit">
						Analyze Image
					</button>				
				</form>
			</div>
		</div>
		
	</div>
</div>
</body>
</html>