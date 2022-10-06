<style type="text/css">
	#proxy_container {
		width: 437px;
		position: bottom;
		top: 0px;
		left: 20px;
	}
	#proxy_form {
		background-color: #00CCFF;
		height: 70px;
		margin: 0px;
		padding: 20px 20px 0px 20px;
	}
	#proxy_url {
		font-family: Tahoma, sans-serif;
		font-size: 14px;
		color: red;
		background-color: white;
		display: block;
		width: 380px;
		padding: 8px;
		border: 0px;
	}
	#proxy_button {
		font-family: "Lucida Sans Unicode", sans-serif;
		font-size: 9px;
		font-weight: bold;
		color: #FFFFFF;
		background-color: #FF4444;
		float: right;
		height: 28px;
		padding: 0px 6px;
		border: 0px;
		cursor: pointer;
	}
	#proxy_toggle {
		font-family: "Lucida Sans Unicode", sans-serif;
		font-size: 10px;
		font-weight: bold;
		color: #FFFFFF;
		text-decoration: none;
		background-color: #FF9900;
		display: block;
		float: left;
		margin: -115px 6px 0px 0px;
		padding: 6px 8px;
		border: 0px;
		-moz-outline-width: 0px;
	}
	#proxy_options {
		padding: 8px 0px 0px 0px;
	}
	#proxy_options label {
		font-family: "Lucida Sans Unicode", sans-serif;
		font-size: 10px;
		font-weight: bold;
		color: #FFFFFF;
		cursor: pointer;
	}
</style>
<div id="proxy_container" align="left">
	<form method="post" action="./" id="proxy_form">
		<!-- Make sure you leave the two input fields the same! -->
		<input type="hidden" name="__proxy_action" value="redirect_browse" />
		<input type="text" name="url" id="proxy_url" />
		<!-- This one you can change -->
		<input type="submit" value="Browse" id="proxy_button" />
		<div id="proxy_options">
			<!-- Don't rename the name="_no_xxx" of these input fields! -->
			<label for="__no_javascript">
				<input type="checkbox" name="__no_javascript" id="__no_javascript" />
				Disable JS
			</label>
			<label for="__no_images">
				<input type="checkbox" name="__no_images" id="__no_images" />
				Disable Pics
			</label>
			<label for="__no_title">
				<input type="checkbox" name="__no_title" id="__no_title" />
				Strip Title
			</label>
			<label for="__no_meta">
				<input type="checkbox" name="__no_meta" id="__no_meta" />
				Strip Meta
			</label>
		</div>
	</form>
	<!-- You don't need this, remove it if you like -->
	<a href="#" id="proxy_toggle" onclick="toggle_form(); return false;">Hide Proxy Form</a>
</div>
