<?php

namespace App\Controllers;
use App\Models\JadwalModel;
use App\Models\PetugasModel;
use App\Models\InstagramModel;
use App\Models\FacebookModel;
use App\Models\TiktokModel;
use App\Models\EmailModel;
use App\Models\WebsiteModel;
use App\Models\WaModel;

class Jadwal extends BaseController
{
    protected $jadwal;

    public function __construct()
    {
        $this->jadwal = new JadwalModel();
    }

    public function index()
    {
        $data['jadwal'] = $this->jadwal->findAll();
        return view('jadwal/index', $data);
    }

    public function create()
    {
        $data['petugas']   = (new PetugasModel())->findAll();
        $data['instagram'] = (new InstagramModel())->findAll();
        $data['facebook']  = (new FacebookModel())->findAll();
        $data['tiktok']    = (new TiktokModel())->findAll();
        $data['email']     = (new EmailModel())->findAll();
        $data['website']   = (new WebsiteModel())->findAll();
        $data['wa']        = (new WaModel())->findAll();

        return view('jadwal/form', $data);
    }

    public function store()
    {
        $this->jadwal->save($this->request->getPost());
        return redirect()->to(base_url('transaksi/jadwal'));
    }

    public function delete($id)
    {
        $this->jadwal->delete($id);
        return redirect()->to(base_url('transaksi/jadwal'));
    }
}