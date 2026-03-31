<?php

class HomeController
{   
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() 
    {   
        $view = 'home';
        $data = $this->productModel->getTop4Lastest();
        require_once PATH_VIEW_MAIN_CLIENT;
    }
}