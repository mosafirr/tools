<?php
function detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}
?>

<!DOCTYPE html>
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="keywords" content="online logo maker, online logo creator, logo maker, создать логотип, лого онлайн, създаване на лого онлайн" />
<meta name="description" content="Online Logo Maker" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Logo Maker Online</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link href="../css/main.css" rel="stylesheet" />
</head>

<body>

<a href="../">Free Online Tools</a>

<h2>Online Logo Maker</h2>
		
		<script language="javascript" type="text/javascript">
			var companyColor = "FF9622";
			var sloganColor = "56ae1b";
			var nowCompany = 1;
		</script>
		<script language="javascript" type="text/javascript" src="./js/main.js"></script>
		<!-- -->
		<script type="text/javascript" src="refresh_web/prototype.js" ></script>
		<script type="text/javascript" src="refresh_web/colorpicker/ColorMethods.js" ></script>
		<script type="text/javascript" src="refresh_web/colorpicker/ColorValuePicker.js" ></script>
		
	<?php
	if (!detect_ie()) {
		echo '<script type="text/javascript" src="refresh_web/colorpicker/Slider.js" ></script>';
		echo '<script type="text/javascript" src="refresh_web/colorpicker/ColorPicker.js" ></script>';
	} else {
		echo '<script type="text/javascript" src="refresh_web/colorpicker/ColorPicker_ie.js" ></script>';
		echo '<script type="text/javascript" src="refresh_web/colorpicker/Slider_ie.js" ></script>';
	}
	?>
		<script type="text/javascript">
		var imgFile = new Array();
		
<?php
	if ($handle = opendir('icon')) 
	{
		$i = 0;
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") 
			{
				list($font, $null) = split('\.', $file);
				$font = ucwords($font);
				echo "imgFile[".$i."] = \"icon/".$file."\";\n";
				$i++;
			}
		}
		closedir($handle);
	}
?>
		
		var imgObj = new Array();
		for (i=0; i<imgFile.length; i++)
		{
			imgObj[i] = new Image(50, 50);
			imgObj[i].src = imgFile[i];
		}
		
		var imgIndex = 0;
		var ie7 = (document.all && !window.opera && window.XMLHttpRequest) ? true : false;
		var ie6 = (document.all && document.getElementById && !window.opera) ? true : false;
		function change_image(index)
		{
			imgIndex += index
			if (imgIndex >= imgFile.length)
				imgIndex = 0
			if (imgIndex < 0)
				imgIndex = imgFile.length-1
			
			$("icon").innerHTML = '<img src="'+imgObj[imgIndex].src+'">';
			
			load_image();
		}
		
		
		var cp1, cp2;
		
		function tab(id)
		{			
		    active = document.getElementsByClassName('active-tab');
		    active[0].className = ''
		    document.getElementById(id).className = "active-tab";
				
			if (id == "one")
			{
				document.getElementById("cp1_Hex").value = companyColor; 
				nowCompany = 1;
			}
			else
			{
				document.getElementById("cp1_Hex").value = sloganColor;
				nowCompany = 0;
			}
			
			cp1.setHex(document.getElementById("cp1_Hex").value);
			cp1.updateVisuals();
			
		  }
		</script>


</head>

<body link="#c90e6a" vlink="#c90e6a" alink="#009cd8">

<table border="0">
<tr>
				<td>
					<font color="#78CBD1" size="3" face="Arial Rounded MT Bold" class="button">Company Name:</font><br>
				  <input type="text" size="25" id="text" value="YourLogo" onkeyup="load_image();"/>			  </td>
				<td>
					<font color="#78CBD1" size="3" face="Arial Rounded MT Bold" class="button">Size:</font><br>
			  <input type="text" id="size" value="28" onkeyup="load_image();" />			  </td>
			</tr>
			<tr>
				<td>
					<font color="#78CBD1" size="3" face="Arial Rounded MT Bold" class="button">Slogan:</font><br>
		      <input type="text" size="55" id="text2" onkeyup="load_image();" />			  </td>
				<td>
					<font color="#78CBD1" size="3" face="Arial Rounded MT Bold" class="button">Size slogan:</font><br>
			  <input type="text" id="size2" value="14" onkeyup="load_image();" />			  </td>
			<tr>
	</table>
			
			<div class="clear"></div><br />
		<table>
			<tr>
				<td valign="top">
				  <font color="#3c3c3c" size="2" face="Arial Rounded MT Bold">Company Font:</font><br>
					<select name="select" size="5" id="font" onchange="load_image();">
                      <?php
	if ($handle = opendir('fonts')) {
		$i = 0;
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") {
				list($font, $null) = split('\.', $file);
				$font = ucwords($font);
?>
                      <option value="<?php echo $file; ?>"<?php echo !$i ? ' selected="selected"' : ''; ?> onclick="load_image();"><?php echo $font; ?></option>
                      <?php
				$i++;
			}
		}
		closedir($handle);
	}
?>
                    </select></td>			
			
				<td rowspan=3>
					<div class="panel active-tab-body" id="oneone">
					<table>
						<tr colspan=3>
							<td valign="top">
								<div>
								  <ul id="tabs">
									<li><font color="#1F78F4" size="2" face="Arial Rounded MT Bold">Choose color for:</font><font color="#1F78F4" size="2" face="Century Gothic">&nbsp;&nbsp;</font></li>
								    <li><a id="one" href="#" class="active-tab" onclick="tab('one'); return false;">Company</a></li>
								    <li><a id="two" href="#" onclick="tab('two'); return false;">Slogan</a></li>
								  </ul>
								</div>							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="cp1_ColorMap"></div>							</td>
							<td valign="top">
								<div id="cp1_ColorBar"></div>							</td>
				
							<td valign="top">
								<table>
									<tr>
										<td colspan="3">
											<div id="cp1_Preview" style="background-color: #fff; width: 60px; height: 60px; padding: 0; margin: 0; border: solid 0px #000;">
												<br />
											</div>										</td>
									</tr>
									<tr>
										<td>
											<input type="radio" id="cp1_HueRadio" name="cp1_Mode" value="0" />										</td>
										<td>
											<label for="cp1_HueRadio">H:</label>										</td>
										<td>
											<input type="text" id="cp1_Hue" value="0" style="width: 50px;" /> &deg;										</td>
									</tr>
				
									<tr>
										<td>
											<input type="radio" id="cp1_SaturationRadio" name="cp1_Mode" value="1" />										</td>
										<td>
											<label for="cp1_SaturationRadio">S:</label>										</td>
										<td>
											<input type="text" id="cp1_Saturation" value="100" style="width: 50px;" /> %										</td>
									</tr>
				
									<tr>
										<td>
											<input type="radio" id="cp1_BrightnessRadio" name="cp1_Mode" value="2" />										</td>
										<td>
											<label for="cp1_BrightnessRadio">B:</label>										</td>
										<td>
											<input type="text" id="cp1_Brightness" value="100" style="width: 50px;" /> %										</td>
									</tr>
				
									<tr>
										<td colspan="3" height="5">										</td>
									</tr>
				
									<tr>
										<td>
											<input type="radio" id="cp1_RedRadio" name="cp1_Mode" value="r" />										</td>
										<td>
											<label for="cp1_RedRadio">R:</label>										</td>
										<td>
											<input type="text" id="cp1_Red" value="255" style="width: 50px;" />										</td>
									</tr>
				
									<tr>

										<td>
											<input type="radio" id="cp1_GreenRadio" name="cp1_Mode" value="g" />										</td>
										<td>
											<label for="cp1_GreenRadio">G:</label>										</td>
										<td>
											<input type="text" id="cp1_Green" value="0" style="width: 50px;" />										</td>
									</tr>
				
									<tr>
										<td>
											<input type="radio" id="cp1_BlueRadio" name="cp1_Mode" value="b" />										</td>
										<td>
											<label for="cp1_BlueRadio">B:</label>										</td>
										<td>
											<input type="text" id="cp1_Blue" value="0" style="width: 50px;" />										</td>
									</tr>
				
				
									<tr>
<td>											#:									
</td>
<td colspan="2">										
<input type="text" id="cp1_Hex" value="FF9622" style="width: 90px;" onchange="load_image();" />										
</td>
									</tr>
								</table>							</td>
						</tr>
					</table>
					</div>				</td>
</tr>
			<tr>
				<td valign="top">
					<font color="#3c3c3c" size="2" face="Arial Rounded MT Bold"">Slogan Font:</font>
					<br><select id="font2" size="5" onchange="load_image();">
<?php
	if ($handle = opendir('slogan_fonts')) {
		$i = 0;
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") {
				list($font, $null) = split('\.', $file);
				$font = ucwords($font);
?>
				<option value="<?php echo $file; ?>"<?php echo !$i ? ' selected="selected"' : ''; ?> onclick="load_image();"><?php echo $font; ?></option>
<?php
				$i++;
			}
		}
		closedir($handle);
	}
?>
					</select>			  </td>
			</tr>
			<tr>
				<td>
					<table border="0">
						<tr>
							<td colspan=3><font color="#3c3c3c" size="2" face="Arial Rounded MT Bold">Choose Logo Image:</font></td>
						</tr>
						<tr>
							<td><a href="javascript:change_image(-1)"><<<</a></td>
							<td><div class="border0" id="icon"></div></td>
							<td><a href="javascript:change_image(1)">>>></a></td>
						</tr>
				  </table>				</td>
			</tr>
		<table>
	
	<div style="display:none;">
		<img src="refresh_web/colorpicker/images/rangearrows.gif" />
		<img src="refresh_web/colorpicker/images/mappoint.gif" />
		
		<img src="refresh_web/colorpicker/images/bar-saturation.png" />
		<img src="refresh_web/colorpicker/images/bar-brightness.png" />
		
		<img src="refresh_web/colorpicker/images/bar-blue-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-br.png" />
		<img src="refresh_web/colorpicker/images/bar-red-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-red-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-red-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-red-br.png" />	
		<img src="refresh_web/colorpicker/images/bar-green-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-green-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-green-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-green-br.png" />
		
		<img src="refresh_web/colorpicker/images/map-red-max.png" />
		<img src="refresh_web/colorpicker/images/map-red-min.png" />
		<img src="refresh_web/colorpicker/images/map-green-max.png" />
		<img src="refresh_web/colorpicker/images/map-green-min.png" />
		<img src="refresh_web/colorpicker/images/map-blue-max.png" />
		<img src="refresh_web/colorpicker/images/map-blue-min.png" />
		
		<img src="refresh_web/colorpicker/images/map-saturation.png" />
		<img src="refresh_web/colorpicker/images/map-saturation-overlay.png" />
		<img src="refresh_web/colorpicker/images/map-brightness.png" />
		<img src="refresh_web/colorpicker/images/map-hue.png" />	
        </div>
	
	<script type="text/javascript">
	
	Event.observe(window,'load',function() {
		cp1 = new Refresh.Web.ColorPicker('cp1',{startHex: 'FF9900', startMode:'s'});
		
	});
	
	
	</script><br>
	<div class="clear"><img src="images/line.jpg" alt="logo studio, cheap logo design, logo maker" /><br />
	</div>
			<div id="image2"></div>
			<img src="images/line.jpg" alt="logo design online" />
			<div><br /> 
<input class="button" name="submit" type="submit" value="Create" onclick="download_image();" />
			  <br/>
			  <br/>
			  <br/>
			  <br/>
			  <br/>
    </div>

<?php
include '../footer.php';
?>
