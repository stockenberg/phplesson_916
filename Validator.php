<?php

class Validator
{

	public $whitelist = [];
	public $page;
	public $defaultPage = 'home';
	public $errorPage = '404';
	public $path;

	public function __construct(Array $whitelist, String $pageParam, String $path)
	{
		$this->whitelist = $whitelist;
		$this->page = $pageParam ?? '';
		$this->path = $path;
	}

	public function getValidatedPage() : String
	{
		if(null !== $this->page){
			if(in_array($this->page, $this->whitelist)){
				if(file_exists($this->path . $this->page . '.php')){
					return $this->page;
				}else{
					return $this->errorPage;
				}
			}
			return $this->defaultPage;
		}
	}

}
