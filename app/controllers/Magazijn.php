<?php

class Magazijn extends BaseController
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = $this->model('MagazijnModel');
    }

    public function index()
    {
        $magazijnProducts = $this->magazijnModel->readMagazijnProduct();

        // var_dump($magazijnProducts);

        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'magazijnProducts' => $magazijnProducts 
        ];

        $this->view('magazijn/index', $data);
    }



}



