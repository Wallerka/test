<?php
 
  $imageDir  = 'img/'; 
  $thumbnailDir = 'thumbs/';

  function getFiles($path)
  {
    clearstatcache();
    $files = scandir($path);
	
    for($i = 0, $length = count($files); $i < $length; $i++)
    {    
      if( is_dir($path.$files[$i]) )
      {
        unset($files[$i]);
      }
    }
    return $files;
  }
?>
 
<!DOCTYPE HTML>
<html lang="ru">

	<head>     
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/featherlight.css" />
		<link rel="stylesheet" href="css/featherlight.gallery.css" />  
		<title>Тестовое задание</title>  
	
		<style>
		.jumbotron { margin-top: 2em; }
		</style>
	
	</head>
   
	<body> 
		<div class="container">	
	
			<div class="jumbotron">
				<h1>Prime Orchestra</h1>
				<span>Фотограф: Валерий Климов</span>				
			</div>
		
			<div class="row">
		
			<?php
			foreach( getFiles($imageDir) as $file )
			{
				echo '<div class="col-lg-2"><a class="thumbnail gallery" href="'.$imageDir.$file.'"><img src="'.$imageDir.$thumbnailDir.$file.'" /></a></div>';		
			}
			?>
	  
			</div> 
		</div>
	
		<script src="js/jquery-1.7.0.min.js"></script>
		<script src="js/featherlight.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/featherlight.gallery.js" type="text/javascript" charset="utf-8"></script>

		<script>
			$(document).ready(function(){
				$('.gallery').featherlightGallery({
					gallery: {
						fadeIn: 300,
						fadeOut: 300
					},
					openSpeed:    300,
					closeSpeed:   300
				});				
			});
			
		</script>			
	
	</body>
   
</html>