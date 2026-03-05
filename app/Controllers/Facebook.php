<?php

namespace App\Controllers;
use App\Models\FacebookModel;

class Facebook extends BaseController
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new FacebookModel();
    }

    public function index()
    {
        $data['facebook'] = $this->facebook->findAll();
        return view('facebook/index', $data);
    }

    public function create()
    {
        return view('facebook/form');
    }

    public function store()
    {
        $this->facebook->save([
            'link_facebook' => $this->request->getPost('link_facebook')
        ]);

        return redirect()->to(base_url('facebook'));
    }

    public function edit($id)
    {
        $data['facebook'] = $this->facebook->find($id);
        return view('facebook/form', $data);
    }

    public function update($id)
    {
        $this->facebook->update($id, [
            'link_facebook' => $this->request->getPost('link_facebook')
        ]);

        return redirect()->to(base_url('facebook'));
    }

    public function delete($id)
    {
        $this->facebook->delete($id);
        return redirect()->to(base_url('facebook'));
    }
}