<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RemarksModel;

class Remarks extends ResourceController
{

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new RemarksModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {

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
        $model = new RemarksModel();
        $data = [
            'requestOrderNumber' => $this->request->getPost('requestOrderNumber'),
            'InventoryAPKId' => $this->request->getPost('InventoryAPKId'),
            'status' => $this->request->getPost('status'),
            'lostitem' => $this->request->getPost('lostitem'),
            'damageditem' => $this->request->getPost('damageditem'),
            'lostamount' => $this->request->getPost('lostamount'),
            'damagedamount' => $this->request->getPost('damagedamount'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respond($response);
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
        $model = new RemarksModel();
        $json = $this->request->getJSON();
        if($json){
            $data = [
                'Remarksid' => $json->Remarksid,
                'OutboundNumber' => $json->OutboundNumber,
                'requestOrderId' => $json->requestOrderId,
                'lostitem' => $json->lostitem,
                'damageditem' => $json->damageditem,
                'lostamount' => $json->lostamount,
                'damagedamount'=> $json->damagedamount,
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'OutboundNumber' => $input['OutboundNumber'],
                'requestOrderId' => $input['requestOrderId'],
                'lostitem' => $input['lostitem'],
                'damageditem' => $input['damageditem'],
                'requestOrderId' => $input['requestOrderId'],
                'lostamount' => $input['lostamount'],
                'damagedamount' => $input['damagedamount'],
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {

    }
}
