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

class PageController{
	private $mapper = null;
	private $page = null;
	private $pattern = "";
	private $mainFrame = "templates/index.html";
	private $templateName;
	private $content = "";
	
	public function __construct(){
		$this->page = new Page('');
		$this->pattern = isset($_GET[PATTERNPARAMETERNAME])? $_GET[PATTERNPARAMETERNAME]:"";
	}
	
	public function doAction($action){
		$content = "";
		switch ($action) {
			case "show":
				//$pagecontroller = new Controller();
				$pageContent = Array();
				/*$pageContent = Array (
					PATTERNNAME => $mapper->getPatternName($this->pattern),
					IMGFILENAME => $mapper->getImgFileName($this->pattern),
					CAPTION => $mapper->getCaption($this->pattern),
					SHORTTEXT => $mapper->getShortText($this->pattern),
					LONGTEXT => $mapper->getLongText($this->pattern),
					SIMILARPATTERNS => $mapper->getSimilarPatterns($this->pattern)
				);*
				/*$pageContent = Array (
					PATTERNNAME => 'Decorator',
					IMGFILENAME => 'images/patterns/decorator.png',
					CAPTION => 'Abb. Decorator',
					SHORTTEXT => 'Kurztext',
					LONGTEXT => 'Langtext',
					SIMILARPATTERNS => 'aehnliche Patterns'
				);*/
				
				$content .= $this->page->parseTemplate('templates' . DIRECTORY_SEPARATOR . $action . '.html',$pageContent);
			break;
			case "impressum":
				$pageContent = Array();
				$content .= $this->page->parseTemplate('templates' . DIRECTORY_SEPARATOR . $action . '.html',$pageContent);
			break;
			default:
				$content .= "Hier folgt die Startseite...";
		}
		$title = "Title";
		return [
				'baseUrl' => BASEURL,
				'title' => $title,
				'content' => $content,
				'year' => date('Y')
				];
	}
	
	public function getContent($pageContent){
		return $this->page->parseTemplate($this->mainFrame,$pageContent);
	}
	
	public function getBaseUrl(){
		return $this->page->getBaseUrl();
	}
}

?>