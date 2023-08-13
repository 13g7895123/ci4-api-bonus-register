<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RegisterModel;

class Register extends BaseController
{
    use ResponseTrait;

    public function phoneValidation()
    {
       $register = new RegisterModel;

        $result['success'] = true;
        $result['data'] = $register->findAll();

        return $this->respond($result, 200);
    }

    public function create()
    {
        $Register = new RegisterModel;
        $data = [
           'name' => $this->request->getVar('name'),
           'cate' => $this->request->getVar('cate'),
           'amount' => $this->request->getVar('amount'),
           'status' => $this->request->getVar('status'),
           'start_contact_date' => $this->request->getVar('start_contact_date'),
        ];
        $Register->insert($data);
        $Register_id = $Register->getInsertID();

        if ($Register_id > 0){
            $result['success'] = true;
            $result['msg'] = 'Register Recorded Successfully!';
            $result['data'] = $Register->find($Register_id);

            return $this->respond($result, 200);
        }else{
            $result['success'] = false;
            $result['msg'] = 'Insert data error';

            return $this->fail($result , 409);
        }
    }
}
