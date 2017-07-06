<?php

class GETValidator
{

    public $whitelist = [];
    public $page;
    public $defaultPage = 'home';
    public $errorPage = '404';
    public $path;

    public function __construct(Array $whitelist, String $getParam, String $path)
    {
        $this->whitelist = $whitelist;
        $this->page = $getParam;
        $this->path = $path;
    }

    public function getValidatedPage(): String
    {
        if ($this->page !== '') {

            if (in_array($this->page, $this->whitelist)) {
                if (file_exists($this->path . $this->page . '.php')) {
                    return $this->page;
                } else {
                    return $this->errorPage;
                }
            }

            if (!file_exists($this->path . $this->page . '.php')) {
                return $this->errorPage;
            }

            return $this->defaultPage;
        } else {
            return $this->defaultPage;
        }
    }

}
