<?php

class getFlights
{

	private $data;
	private $response;
	private $url = 'http://apis.is/flight';
	private $cacheFile = 'json.cache';
	private $flights = '';
	
	public function __construct($language, $type)
	{	
		$this->cacheFile = $language . $type . $this->cacheFile;
		$this->url .= '?language=' . $language . '&type=' . $type;
		$this->getCachedResponse();
	
		return $this;
	}
	
	public function getJSON()
	{
		$ch = curl_init();

		// Disable SSL verification
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $this->url);

		// grab URL and pass it to the browser
		$this->response = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
		
		$this->writeCacheFile();
	}
	
	public function getCachedResponse()
	{
		
		$currentTime = time(); 			// Fáum tímann núna
		$expireTime = 5 * 60;			// Setjum expire tímann á 5 mínutur
		$fileTime = @filemtime($this->cacheFile);
		
		if(file_exists($this->cacheFile) && ($currentTime - $expireTime) < $fileTime)
		{
			$this->data = file_get_contents($this->cacheFile);
			return true;
		}
		else
		{
			$this->getJSON();
		}
		
	}
	
	public function writeCacheFile()
	{
		if($this->response != null)
		{
			file_put_contents($this->cacheFile, $this->response);
			$this->data = $this->response;
		}
	}
	
	public function getData()
	{
		return $this->data;
	}
}

?>