<?php

namespace App\Controllers;
use App\Models\WebsiteModel;

class Website extends BaseController
{
    protected $website;

    public function __construct()
    {
        $this->website = new WebsiteModel();
    }

    public function index()
    {
        $data['website'] = $this->website->findAll();
        return view('website/index', $data);
    }

    public function create()
    {
        return view('website/form');
    }

    public function store()
    {
        $this->website->save([
            'link_website' => $this->request->getPost('link_website')
        ]);

        return redirect()->to(base_url('website'));
    }

    public function edit($id)
    {
        $data['website'] = $this->website->find($id);
        return view('website/form', $data);
    }

    public function update($id)
    {
        $this->website->update($id, [
            'link_website' => $this->request->getPost('link_website')
        ]);

        return redirect()->to(base_url('website'));
    }

    public function delete($id)
    {
        $this->website->delete($id);
        return redirect()->to(base_url('website'));
    }
}