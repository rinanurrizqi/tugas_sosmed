<?php

namespace App\Controllers;
use App\Models\WaModel;

class Wa extends BaseController
{
    protected $wa;

    public function __construct()
    {
        $this->wa = new WaModel();
    }

    public function index()
    {
        $data['wa'] = $this->wa->findAll();
        return view('wa/index', $data);
    }

    public function create()
    {
        return view('wa/form');
    }

    public function store()
    {
        $this->wa->save([
            'no_wa' => $this->request->getPost('no_wa')
        ]);

        return redirect()->to(base_url('wa'));
    }

    public function edit($id)
    {
        $data['wa'] = $this->wa->find($id);
        return view('wa/form', $data);
    }

    public function update($id)
    {
        $this->wa->update($id, [
            'no_wa' => $this->request->getPost('no_wa')
        ]);

        return redirect()->to(base_url('wa'));
    }

    public function delete($id)
    {
        $this->wa->delete($id);
        return redirect()->to(base_url('wa'));
    }
}