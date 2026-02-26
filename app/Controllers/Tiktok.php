<?php

namespace App\Controllers;
use App\Models\TiktokModel;

class Tiktok extends BaseController
{
    protected $tiktok;

    public function __construct()
    {
        $this->tiktok = new TiktokModel();
    }

    public function index()
    {
        $data['tiktok'] = $this->tiktok->findAll();
        return view('tiktok/index', $data);
    }

    public function create()
    {
        return view('tiktok/form');
    }

    public function store()
    {
        $this->tiktok->save([
            'link_tiktok' => $this->request->getPost('link_tiktok')
        ]);

        return redirect()->to(base_url('tiktok'));
    }

    public function edit($id)
    {
        $data['tiktok'] = $this->tiktok->find($id);
        return view('tiktok/form', $data);
    }

    public function update($id)
    {
        $this->tiktok->update($id, [
            'link_tiktok' => $this->request->getPost('link_tiktok')
        ]);

        return redirect()->to(base_url('tiktok'));
    }

    public function delete($id)
    {
        $this->tiktok->delete($id);
        return redirect()->to(base_url('tiktok'));
    }
}