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
        $rules = [
            'id_email' => 'required|is_unique[email.id_email]',
            'alamat_email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->email->save([
            'id_email'     => $this->request->getPost('id_email'),
            'alamat_email' => $this->request->getPost('alamat_email')
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/email');
    }

    public function edit($id)
    {
        $data['email'] = $this->email->find($id);
        return view('email/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'alamat_email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->email->update($id, [
            'alamat_email' => $this->request->getPost('alamat_email')
        ]);

        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to('/email');
    }

    public function delete($id)
    {
        $this->email->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/email');
    }
}