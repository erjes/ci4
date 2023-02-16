<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Loginmodel;

class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index_get()
    {
    
    }


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $modelmenu = new Loginmodel();
        $id = $this->request->getPost("id");
        $outbound = $this->request->getPost("requestOrderumber");
        $roid = $this->request->getPost("requestOrderId");
        $barcode = $this->request->getPost("barcode");

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'id' => [
                'rules' => 'is_unique[Menu.id]',
                'label' => 'Data Inventory',
                'errors' => [
                    'is_unique' => "{field} sudah ada"
                    ]
            ]
                ]);

        if(!$valid){
            $response = [
                'status' => 404,
                'error' => true,  
                'message' => $validation->getError("id"), 
            ];
            return $this->respond($response,404);
        }else{
            $modelmenu->insert([
                'id' => $id,
                'requestOrderumber'=> $outbound,
                'requestOrderId' => $roid,
                'barcode' => $barcode,
            ]);
    
            $response = [
                'status' => 201,
                'error' => false,
                'message' => "Disimpan"
            ];
            return $this->respond($response,201);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
