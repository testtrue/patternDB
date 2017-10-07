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
 *
 * HowTo: Create a new PageController. 
 *		  Call "doAction()" with an action as string.
 *		  That returned array should be hand over to "getContent()".
 *		  The result of "getContent()" should be echoed.
 */
class PageController{
	private $page = null;
	private $pattern = "";
	private $mainTemplate = "templates/index.html";
	
	/**
	 * Constructor
	 */
	public function __construct(){
		$this->page = new Page('');
		$this->pattern = isset($_GET[PATTERNPARAMETERNAME])? $_GET[PATTERNPARAMETERNAME]:"";
	}
	
	/**
	 * Does a specific action, predefined by the action-parameter.
	 * Returns the parsed site
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
				$db = DBConnector::getInstance();
				$resultSet = $db->executeQuery("SELECT id_pattern FROM patterndb.pattern")->fetch_all();
				$mapper = new PropertyMapper();
				$length = count($resultSet);
				for($i = 0; $i< $length;$i++){
					$pattern = $mapper->mapProperties("Pattern",$resultSet[$i][0]);
					$patternvals = [
								'patternid' => $resultSet[$i][0],
								'imgfilename' => $pattern->getPicture()->getFileName(),
								'pattern' => $pattern->getName(),
								'shorttext' => $pattern->getShortDescription(),
								'position' => ($resultSet[$i][0]%2==1?"Left":"Right"),
								'offset' => "col-sm-offset-".($resultSet[$i][0]%2)
								];
					$rowcontent = [
						'content' => (isset($rowcontent['content'])? $rowcontent['content']:"" ). 
								$this->page->parseTemplate('templates' . DIRECTORY_SEPARATOR . 'startpagepattern.html',$patternvals)
						];
					if($resultSet[$i][0]%2==0 || $i == ($length-1)){
						$pagecontent= [
						'content' => (isset($pagecontent['content'])?$pagecontent['content']:"").
								$this->page->parseTemplate('templates'. DIRECTORY_SEPARATOR . 'startpagerow.html',$rowcontent)
						];
						$rowcontent = [];
					}
				}
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
	 * Parse mainpage
	 * Predefined is "templates/index.html"
	 */
	public function getContent($pageContent){
		return $this->page->parseTemplate($this->mainTemplate,$pageContent);
	}
	
	/*
	 * @Return String
	 * Return baseurl 
	 */
	public function getBaseUrl(){
		return $this->page->getBaseUrl();
	}
	
	public function setMainTemplate($page){
		$this->mainTemplate = $page;
	}
}

?>