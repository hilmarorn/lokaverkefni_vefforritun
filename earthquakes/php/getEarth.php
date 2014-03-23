<?php
	
class getEarth
{

	private $data;
	private $response;
	private $url = 'http://www.apis.is/earthquake/is';
	private $cacheFile = 'json.cache';
	
	public function __construct()
	{
		$this->getCachedResponse();
	
		return $this;
	}
	
	public function getJSON()
	{
		$ch = curl_init();

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
		$expireTime = 30 * 60;			// Setjum expire tímann á 30 mínutur
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