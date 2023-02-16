<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RequestOrderModel;
use App\Models\RequestOrderLineModel;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\MainModel;
use CodeIgniter\Format\JSONFormatter;



class Main extends ResourceController{
    // protected $db;
    // public function __construct(ConnectionInterface &$db){ 
    //     $this->db=$db;
    // }

    // function all (){
    //     return $this->db->table('RequestOrder')->get()->getResult();
    //     // return $this->db->table('RequestOrderLine')->get()->getResult();
    // }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        // $model = new MainModel();
        // $data = $model->findAll();
        // return $this->respond($data, 200);
        // $modelrl = new RequestOrderLineModel;
        // $modelro = new RequestOrderModel;
        // 'requestOrderNumber' => $this->request->getGetPost('requestOrderNumber');
        // $roid = $subquery->get()->getResult()
        // $obn = ['OutboundNumber' => $this->request->getPost('OutboundNumber')];
        // $data = $modelro->getWhere(['requestOrderNumber' => $obn])->getResult();
        // if($data){
        //     return $this->respond($data);
        // }else{
        //     return $this->failNotFound('No Data Found with id '.$obn);
                // if($json){
        //     $data = [
        //         'requestOrderNumber' => $json->requestOrderNumber,
        //     ];
        // }else{
        //     $input = $this->request->getRawInput();
        //     $data = [
        //         'requestOrderNumber' => $input['requestOrderNumber'],
        //     ];
        // $json = $this->request->getJSON()
        $db = \Config\Database::connect();
        $data = ['requestOrderNumber' => $this->request->getGetPost('requestOrderNumber')];
        $subquery = $db->table('RequestOrder')->select('requestOrderId')->where('requestOrderNumber', $data);
        $builder = $db->table('RequestOrderLine')->select('barcode')->where('requestOrderId', $subquery);
        $query   = $builder->get()->getResultArray();
        $query3   = $subquery->get()->getResultArray();
        // $query2   = $subquery->get()->getResult();
        return $this->response->setJSON($query);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null){
        // foreach ($query->getResult('array') as $row) {
        //     echo $row['barcode'];
        // }
        // $db = \Config\Database::connect();
        // $builder = $db->table('RequestOrder');
        // $builder2 = $db->table('RequestOrderLine');
        // $builder->select('requestOrderId');
        // $this->$db->select('*');
        // $this->$db->from('products');
        // $this->$db->join('tbl_lining', 'products.lining=tbl_lining.id', 'left');
        // $this->$db->where('products.id', $id);  // Also mention table name here
        // $query = $this->$db->get();    
        // if($query->num_rows() > 0)
        // return $query->result();   
 
        // $data = ['OutboundNumber' => $this->request->getPost('OutboundNumber')];
        // $query = $builder->getWhere(['requestOrderId' => $data]);
    
        // $query =  $builder 
		// return view('Main', $data);
        // $response = [
        //     'status'   => 201,
        //     'error'    => null,
        //     'messages' => [
        //         'success' => 'Get Data Berhasil'
        //     ]
        // ];
        // return $this->respond($response);
    
        // return $this->respond($query, 201);
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
        // $model = new MainModel();
        // $data = ['OutboundNumber' => $this->request->getPost('OutboundNumber')];
        // $db = \Config\Database::connect();
        // $db->table('RequestOrder');
        $model = new MainModel();
        $data = [
            'InventoryAPKId' => $this->request->getPost('InventoryAPKId'),
            'requestOrderNumber' => $this->request->getPost('requestOrderNumber'),
            'requestOrderId' => $this->request->getPost('requestOrderId'),
            'latitude' => $this->request->getPost('latitude'),                                    
            'longitude' => $this->request->getPost('longitude'),   
            'status' => $this->request->getPost('status'),   
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
    // $modelrl = new RequestOrderLineModel;
    // $modelro = new RequestOrderModel;

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
        $model = new MainModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}
