<?php

	function vinecurl($vinelink)
	{
			$curl = curl_init($vinelink);

			curl_setopt($curl, CURLOPT_FAILONERROR, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_TIMEOUT, 15);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

			$response = curl_exec($curl);

			curl_close($curl);
			
			return($response);

	}
	
	function vinevideo($response)
	{
		preg_match('/property="twitter:player:stream" content="(.*?)"/', $response, $matches);
        $url = $_SERVER['REQUEST_URI'];
        return ($matches[1]) ? $matches[1] : false;	
	}
	
	function vineimage($response)
	{
		preg_match('/property="twitter:image" content="(.*?)"/', $response, $matches);
        $url = $_SERVER['REQUEST_URI'];
        return ($matches[1]) ? $matches[1] : false;	
	}

?>