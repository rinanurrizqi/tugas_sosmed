<?php

namespace App\Controllers;
use App\Models\EmailModel;

class Email extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email = new EmailModel();
    }

    public function index()
    {
        $data['email'] = $this->email->findAll();
        return view('email/index', $data);
    }

    public function create()
    {
        return view('email/form');
    }

    public function store()
    {
        $this->email->save([
            'alamat_email' => $this->request->getPost('alamat_email')
        ]);

        return redirect()->to(base_url('email'));
    }

    public function edit($id)
    {
        $data['email'] = $this->email->find($id);
        return view('email/form', $data);
    }

    public function update($id)
    {
        $this->email->update($id, [
            'alamat_email' => $this->request->getPost('alamat_email')
        ]);

        return redirect()->to(base_url('email'));
    }

    public function delete($id)
    {
        $this->email->delete($id);
        return redirect()->to(base_url('email'));
    }
}