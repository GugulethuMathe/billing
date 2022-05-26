<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TenantModel;
use App\Controllers\Base;


class Register extends BaseController
{

    public function index()
    {

        return view('frontend/register');
    }

    public function addUser()
    {
        $data = [];
        helper(['form', 'url', 'text']);
        $model = new UserModel();
        $request = \Config\Services::request();
        $db = \Config\Database::connect();
        $session = session();

        $apartment_id =  $request->getVar('apartment_id');
        $newData = [
            'first_name' => $request->getVar('first_name'),
            'last_name' => $request->getVar('last_name'),
            'email' => $request->getVar('email'),
            'contact' => $request->getVar('contact'),
            'next_of_keen' => $request->getVar('next_of_keen'),
            'id_num' => $request->getVar('id_num'),
            'reference_num' => random_string('alnum', 5),
            'status' => $request->getVar('status'),
            'address' => $request->getVar('address'),
            'apartment_id' => $apartment_id,
            'emp' => $request->getVar('emp'),
            'next_of_keen_contact' => $request->getVar('next_of_keen_contact')
        ];
        if ($model->save($newData)) {
            $user_id = $model->getInsertID();
            $_SESSION['tenant_id']  = $user_id;
            $this->sendMail();
            $session->setFlashdata("success_reg", "Your personal details were sent, add atttachments to complete your application.");
            return redirect()->to('/register-step');
        }
    }
    public function resumeApplication()
    {

        return view('frontend/resume_application');
    }

    public function registerStep()
    {
        helper(['form', 'url']);
        return view('frontend/uploads');
    }
    public function tenantDocument()
    {

        helper(['form', 'url']);
        $database = \Config\Database::connect();
        $db = $database->table('tenant_files');

        $request = \Config\Services::request();
        // Id copy

        $id = $request->getFile('id_attach');
        $this->saveFile($id, $request, $db, "ID Copy");
        $statement = $request->getFile('statement');
        $this->saveFile($statement, $request, $db, "Statement");
        $pay_slip = $request->getFile('pay_slip');
        $this->saveFile($pay_slip, $request, $db, "Pay slip");

        return redirect()->to('/success');
    }

    function saveFile($img, $request, $db, $doc_type)
    {
        $newName = $img->getRandomName();
        $img->move('uploads', $newName);
        $path = "uploads/$newName";
        $data = [
            'name' =>  $img->getName(),
            'emp' =>   $request->getVar('emp'),
            'doc_type' =>   $doc_type,
            'tenant_id' =>  $request->getVar('tenant_id'),
            'path' => $path,
            'type'  => $img->getClientMimeType()
        ];
        $save = $db->insert($data);
    }

    public function sendMail()
    {
        $email = \Config\Services::email(); // loading for use
        $request = \Config\Services::request();

        // This is for getting form data while submit
        $full_name = $request->getVar('first_name') . " " .  $request->getVar('last_name');
        $contact = $request->getVar('contact');
        $apartment_id = $request->getVar('apartment_id');
        $to = $request->getVar('email');

        $email->setTo($to);
        $email->setFrom('butho@mpholdings.co.za', 'MP Rentals');
        // If you need to send mail to CC and BCC
        // $email->setCC('another@another-user.com');
        // $email->setBCC('other@other-user.com');
        $data = array(
            'name'          =>  $full_name,
            'from'          =>  $to,
            'contact'       =>  $contact,
            'email'       =>  $to
          
        );
        $data1['data'] = $data;

        $email->setSubject("Application submitted successfully");
        $email->setMessage(view('template/tenant_reg', $data1));

        if ($email->send()) {
            //Send to admins
            $email->clear(TRUE);
            // $email->setTo(['butho@mpholdings.co.za', 'gugulethumath@gmail.com','anthony.mpofu@gmail.com','calvinhm64@gmail.com','calvinhm64@gmail.com']);
            $email->setTo(['cryptoogee@gmail.com']);
            $email->setFrom('butho@mpholdings.co.za', 'MP Rentals');
            // If you need to send mail to CC and BCC
            // $email->setCC('another@another-user.com');
            // $email->setBCC('other@other-user.com');
            $data = array(
                'name'          =>  $full_name,
                'from'          =>  $to,
                'apartment_id'       =>  $apartment_id,
                'contact'       =>  $contact,
                'email'       =>  $to
            );
            $data_admin['data'] = $data;

            $email->setSubject("New application on MP Rentals");
            $email->setMessage(view('template/admin', $data_admin));
            $email->send();
            $email->clear(TRUE);
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    public function registerFiles()
    {
    }
}
