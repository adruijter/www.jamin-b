<?php

class Leverancier extends BaseController
{
    private $leverancierModel;

    public function __construct()
    {
        $this->leverancierModel = $this->model('LeverancierModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Leveranciers'
        ];

        $result = $this->leverancierModel->getLeveranciersWithProducts();

        if (is_null($result)) {
            // Fout afhandelen
            $data['message'] = "Er is een fout opgetreden in de database";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:10; url=' . URLROOT . '/Homepages/index');
        } else {
            $data['dataRows'] = $result;
            // $data['pagination'] = new Pagination($result[0]->TotalRows, $limit, $offset, __CLASS__, __FUNCTION__);
        }

        // var_dump($result);

        $this->view('leverancier/index', $data);
    }
}