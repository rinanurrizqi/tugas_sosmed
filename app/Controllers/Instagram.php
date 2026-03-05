<?php

namespace App\Controllers;
use App\Models\InstagramModel;

class Instagram extends BaseController
{
    protected $instagram;

    public function __construct()
    {
        $this->instagram = new InstagramModel();
    }

    public function index()
    {
        $data['instagram'] = $this->instagram->findAll();
        return view('instagram/index', $data);
    }

    public function create()
    {
        return view('instagram/form');
    }

    public function store()
    {
        $this->instagram->save([
            'link_instagram' => $this->request->getPost('link_instagram')
        ]);

        return redirect()->to(base_url('instagram'));
    }

    public function edit($id)
    {
        $data['instagram'] = $this->instagram->find($id);
        return view('instagram/form', $data);
    }

    public function update($id)
    {
        $this->instagram->update($id, [
            'link_instagram' => $this->request->getPost('link_instagram')
        ]);

        return redirect()->to(base_url('instagram'));
    }

    public function delete($id)
    {
        $this->instagram->delete($id);
        return redirect()->to(base_url('instagram'));
    }
}