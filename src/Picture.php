<?php
class Picture{
	
	/*
	* @var int
	*/
	private $ID;
	
	/*
	* @var int
	*/
	private $pictureTypeID;
	
	/*
	* @var string
	*/
	private $name;
	
	/*
	* @var string
	*/
	private $filepath;
	
	/*
	* @var string
	*/
	private $caption;  // Bildunterschrift
	
	/*
	*instantiate the object
	* @param int
	* @param int
	* @param string
	* @param string
	*/
	public function __construct ($ID, $pictureTypeID, $name, $filename){
		$this->setID($ID); 
		$this->setPictureTypeID($pictureTypeID);
		$this->setName($name);
		$this->setFilename($filename);	
	}
	/*
	* returns ID
	* @return int
	*/
	public function getID (){
		return $this->ID;
	}
	/*
	* @param int
	*/
	public function setID ($ID){
		$this->ID = $ID;
	}
	/*
	* returns PictureID
	* @return int
	*/
	public function getPictureTypeID (){
		return $this->pictureTypeID;
	}
	/*
	* @param int
	*/
	public function setPictureTypeID ($pictureTypeID){
		$this->pictureTypeID = $pictureTypeID;
	}	
	/*
	* gets the name or sets the name of a picture
	* @return string
	*/
	public function getName (){
		return $this->name;
	}
	/*
	* @param string
	*/
	public function setName ($name){
		$this->name = $name;
	}
	/*
	* gets the filename or sets the filename of a picture
	* @return string
	*/
	public function getFilepath (){
		return $this->filepath;
	}
	/*
	* @param string
	*/
	public function setFilepath ($filepath){
		$this->filepath = $filepath;
	}
	
	/*
	* returns caption
	* @return string
	*/
	public function getCaption (){
		return $this->caption;
	}
	/*
	* @param string
	*/
	public function setCaption ($caption){
		$this->caption = $caption;
	}
	
}



?>