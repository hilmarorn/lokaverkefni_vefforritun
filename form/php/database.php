<?php

class Database 
{

	private $con;
	private $posted;

	public function __construct()
	{
		$this->con = new PDO('sqlite:db/info.db'); // success
		$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->posted = false;
	}
	
	public function getEvents()
	{
		return $this->con->query('SELECT * FROM info');
	}
	
	public function getEvent($id = null)
	{
		if($id == null)
			return false;
			
		return $this->con->query('SELECT * FROM info WHERE id = ' . $id)->fetch();
		
	}
	
	public function getInput($key = null)
	{
		if($key == null)
			return;
			
		if(!$this->posted) {
			if(isset($_POST[$key]))
				print $_POST[$key];
		}
		else {
			$posted = 0;
		}
	}

	public function cleanse($input)
	{
		$data = new stdClass();
		if(is_array($input))
		{
			foreach($input as $k => $v)
				$data->$k = $v;
			
			return $data;
		}
	}
	
	public function timestamp($text)
	{
		return print date('d-m-Y h:m', $text);
	}
	
	public function addEvent()
	{
		if(isset($_POST['submit']))
		{
			$data = $this->cleanse($_POST);
			$errors = 0;
			
			//Validate field input
			if(empty($data->title))
			{
				$_POST['error_title'] = 'You have to fill in a title';
				$errors++;
			}
			
			if(empty($data->name))
			{	
				$_POST['error_name'] = 'You have to fill in name';
				$errors++;
			}
			
			if(empty($data->email))
			{
				$_POST['error_email'] = 'You have to fill out email';
				$errors++;
			}
			
			if(empty($data->country))
			{
				$_POST['error_country'] = 'You have to fill out country';
				$errors++;
			}
			
			if(empty($data->description))
			{
				$_POST['error_description'] = 'You have to add some description about your experience.';
				$errors++;
			}
				
			if(!filter_var($data->email, FILTER_VALIDATE_EMAIL))
			{
				$_POST['error_email'] = 'Invalid e-mail address.';
				$errors++;
			}
			
			$alphaPattern = '/^[a-z\s]*$/i';
			
			if(!preg_match($alphaPattern, $data->name))
			{
				$_POST['error_name'] = 'Name may only contain alphabetic characters.';
				$errors++;
			}
			
			if(!preg_match($alphaPattern, $data->country))
			{
				$_POST['error_country'] = 'Country may only contain alphabetic characters.';
				$errors++;
			}
			
			if($errors > 0)
				return;
			
			try{
				
				$sql = "INSERT INTO info(title,name,email,country,description) VALUES(:title, :name, :email, :country, :description)";
				
				$q = $this->con->prepare($sql);
				
       
				$q->bindParam(':title', $data->title);
				$q->bindParam(':name', $data->name);
				$q->bindParam(':email', $data->email);
				$q->bindParam(':country', $data->country);
				$q->bindParam(':description', $data->description);
				
				$q->execute();
				
				$this->posted = 1;
				$_POST['messageDone'] = 'Your experience has been posted.';
				
			}
			catch(Exception $ex)
			{
				print $ex;
			}
		}
	}

}
