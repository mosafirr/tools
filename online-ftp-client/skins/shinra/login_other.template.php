<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/shinra/login_other.template.php begin -->
	<!-- WRAPPER -->
<link type="text/css" rel="stylesheet" href="../css/main.css" />
		<!-- ENDS HEADER -->

		<!-- MAIN -->
		<div id="main">
			<a href="../"> Free Online Tools </a><br>
			<!-- content -->
			<div id="content">
<br>
<br>

				
					<h2>Online FTP Client - Net2FTP</h2><br>
					<span class="subtitle">Connect to your FTP server and start editing your website now...</span><br>
<br>
		
		
				
				<!-- ENDS title -->
				
				<!-- Posts -->
				<div id="posts">


					<!-- post -->
					<div class="post">

<?php require_once($net2ftp_globals["application_skinsdir"] . "/" . $net2ftp_globals["skin"] . "/loginform.template.php"); ?>

					</div>
					<!-- ENDS post -->
			
				</div>
				<!-- ENDS Posts -->

				<!-- sidebar -->
				<ul id="sidebar">
					<!-- init sidebar -->
					<li>
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://brigante.sytes.net/online-ftp-client/" send="false" layout="box_count" width="50" show_faces="true" action="like" font=""></fb:like>
						<h2>Features::.</h2>		
						<ul>
					<li class="cat-item"><a>Navigate the FTP server</a></li>
					<li class="cat-item"><a>Upload and download files</a></li>
					<li class="cat-item"><a>Edit files (WYSIWYG)</a></li>
					<li class="cat-item"><a>View code with syntax highlighting</a></li>
					<li class="cat-item"><a>Copy, move, delete (2nd FTP server)</a></li>
					<li class="cat-item"><a>Rename and chmod (also recursive)</a></li>
					<li class="cat-item"><a>Zip and unzip files</a></li>
					<li class="cat-item"><a>Install software</a></li>
					<li class="cat-item"><a>Search for words or phrases</a></li>
					<li class="cat-item"><a>Calculate the size of directories and files</a></li>
						</ul>

					</li>
					<!-- ENDS init sidebar -->
				</ul>
				<!-- ENDS sidebar -->

</div>
<?php
include '../footer.php';
?>
</div>




<!-- Template /skins/shinra/login_other.template.php end -->
