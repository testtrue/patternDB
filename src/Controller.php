<?
// GET-Parametername for patterns
define('PATTERNPARAMETERNAME','pattern');
// Placeholder in the template for certain content
define('BASEURLPARAMETERNAME','baseUrl');
define('TITLEPARAMETERNAME','title');
define('HEADERPARAMETERNAME','header');
define('STATUSPARAMETERNAME','status');
define('CONTENTPARAMETERNAME','content')
define('FOOTERPARAMETERNAME','footer')
// End of placeholder

class Controller{
	private $page = null;
	private $pattern = "";
	private $templateName;
	private $baseURL = "";
	private $title = "";
	private $varheader = "";
	private $status = "";
	private $content = "";
	private $footer = "";
	
	public __construct($templateName){
		$this->templateName = $templateName;
		$this->page = new Page('');
		$this->pattern = _GET[PATTERNPARAMETERNAME];
	}
	
	public function setBaseURL($baseURL){
		$this->baseURL = $baseURL;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function setHeader($header){
		$this->varheader = $header;
	}
	
	private function computeContent(){
		
	}
	
	public function setFooter($footer){
		$this->footer = $footer;
	}
	public function getContent(){
		$pageContent = Array (
		BASEURLPARAMETERNAME => $this->baseURL,
		TITLEPARAMETERNAME => $this->title,
		HEADERPARAMETERNAME => $this->varheader,
		STATUSPARAMETERNAME => $this->status,
		CONTENTPARAMETERNAME => $this->content,
		FOOTERPARAMETERNAME => $this->footer;
		);
		return $page->parseTemplate($this->templateName,$pageContent);
	}
}

?>