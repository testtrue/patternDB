<?php
// GET-Parametername for patterns
define('PATTERNPARAMETERNAME','pattern');
// Placeholder in the template for certain content
define('PATTERNNAME','pattern');
define('IMGFILENAME','imgfilename');
define('CAPTION','caption');
define('SHORTTEXT','shorttext');
define('LONGTEXT','longtext');
define('SIMILARPATTERNS','similarpatterns');
// End of placeholder
/**
 * @author Boas Lehrke
 * Date: 28.09.2017
 */
class PageController{
	private $page = null;
	private $pattern = "";
	private $mainFrame = "templates/index.html";
	
	/**
	 * Constructor
	 */
	public function __construct(){
		$this->page = new Page('');
		$this->pattern = isset($_GET[PATTERNPARAMETERNAME])? $_GET[PATTERNPARAMETERNAME]:"";
	}
	
	/**
	 * Does a specific action, predefined by the action-parameter.
	 * Returns the parse site
	 * @return string
	 */
	public function doAction($action){
		$content = "";
		$pagecontent = [];
		switch ($action) {
			case "show":
				$mapper = new PropertyMapper();
				$pattern = $mapper->mapProperties("Pattern",$this->pattern);
				$pagecontent = [
					PATTERNNAME => $pattern->getName($this->pattern),
					IMGFILENAME => $pattern->getPicture()->getFileName($this->pattern),
					CAPTION => $pattern->getPicture()->getCaption($this->pattern),
					SHORTTEXT => $pattern->getShortDescription($this->pattern),
					LONGTEXT => $pattern->getLongDescription($this->pattern)
					//SIMILARPATTERNS => $pattern->getSimilarPatterns($this->pattern)
				];
			break;
			case "impressum":
				
			break;
			default:
				$action = "startpage";
		}
		$content .= $this->page->parseTemplate('templates' . DIRECTORY_SEPARATOR . $action . '.html',$pagecontent);
		$title = "Title";
		return [
				'baseUrl' => BASEURL,
				'title' => $title,
				'content' => $content,
				'year' => date('Y')
				];
	}
	
	/*
	
	*/
	public function getContent($pageContent){
		return $this->page->parseTemplate($this->mainFrame,$pageContent);
	}
	
	/*
	 * @Return String
	 * Return baseurl 
	 */
	public function getBaseUrl(){
		return $this->page->getBaseUrl();
	}
}

?>