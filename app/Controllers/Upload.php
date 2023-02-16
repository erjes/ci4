<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RemarksModel;

class Upload extends ResourceController
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
        $model = new RemarksModel();
        $data = [
            'documentimage' => $this->request->getPost('documentimage'),
            'encodedimage' => $this->request->getPost('encodedimage')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($data, 201);   
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
    public function update($Id = null)
    {
       

        // $validation = \Config\Services::validation();

        // $valid = $this ->validate([
        //     'documentphoto' => [
        //         'label' => 'File Image',
        //         'rules' => 'uploaded[documentimage]|is_image[documentimage]|ext_in[documentimage,png,jpg,jpeg]|mime_in[documentphoto,image/png,image/jpg,image/jpeg]',
        //         'errors' => [
        //             'uploaded' => '{field} upload required',
        //             'mime_in' => '{field} wrong mime',
        //         ],
        //     ],
        // ]);

        // if(!$valid){
        //     $error_msg =[
        //         'err_upload' => $validation->getError('documentimage')
        //     ];

        //     $response = [
        //         'status' => 404,
        //         'error' => 404,
        //         'message' => $error_msg,
        //     ];
        //     return $this->respond($response,404);
        // }else{
      
        //     $img = $this->request->getFile('documentimage');

        //     if(!$img->hasMoved()){
        //         $img->move('uploads',$img->getName());
        //     }
        //     $documentimage = $this->request->getPost("documentimage");
        //     $documentimage = [
        //         'documentimage' => $img ->getName(),
        //     ];

        //     $modelupload->update($Id,$documentimage);

        //     $response = [
        //         'status' => 201,
        //         'error' => 201,
        //         'message' => 'Image Uploaded'
        //     ];
        //     return $this->respond($response, 201);
        // }
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
