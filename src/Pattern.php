<?php

class Pattern{
	/*
	* @var int
	*/
	private $ID;
	/*
	* @var string
	*/
	private $type;
	/*
	* @var string
	*/
	private $name;
	/*
	* @var array
	*/
	private $pictures; 
	private $shortDescription;
	private $longDescription;
	private $codeExample;
	
	/*
	*instantiate the object
	* @param int
	* @param string
	* @param string
	*/
	public function __construct ($ID, $type, $name){
		$this->setID($ID); 
		$this->setType($type);
		$this->setName($name);	
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
	
	/*returns the type or sets the type of a pattern.
	* @return string
	*/
	public function getType (){
		return $this->type;
	}
	/*
	* @param int
	*/
	public function setType ($type){
		$this->type = $type;
	}
	/*returns the name or sets the name of a picture.
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
}

?>