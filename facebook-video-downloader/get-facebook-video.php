<?php
	
	$path = "..";
	if (isset($_POST['url']))
	{
		if (!empty($_POST['url']))
		{
		
			$parse = parse_url($_POST['url']);
			if ($parse['host']=='vine.co')
			{
			
				require_once('Instagram.php');
				$response = vinecurl($_POST['url']);
				$video	  = vinevideo($response);
				$image	  = vineimage($response);
			
			}
			else
			{
				require_once('OpenGraph.php');
				
				$graph = OpenGraph::fetch($_POST['url']);
				
				$video = $graph->video;
				$image = $graph->image;
				
				if (!$video)
				{
					header('Location: ./index.php');
				}
				
			}
			
		}
		else
		{
			header('Location: ./index.php');
		}
	}
	else
	{
		header('Location: ../index.php');
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>  
<meta charset="utf-8">
<title>Download FB Videos Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>

<body>

<a href="../">Free Online Tools</a>
				
<h2>Facebook Video Downloader</h2>
				
<img src="<?php echo $image;?>" style="width:20%;"><br />

<a href="<?php echo $video;?>" title="Right Click -> Save As..." class="button" target="_blank">Download Video</a>
<br>
<br />
<a href="./">Download other video clip</a>

<?php
include '../footer.php';
?>
