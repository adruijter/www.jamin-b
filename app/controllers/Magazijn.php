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
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'dataRows' => NULL
        ];

        $result = $this->magazijnModel->getAllMagazijnProducts();

        if (is_null($result)) {
            // Fout afhandelen
        } else {
            $data['dataRows'] = $result;
        }

        $this->view('magazijn/index', $data);
    }



}



