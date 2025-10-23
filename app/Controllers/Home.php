<?php

namespace App\Controllers;
use App\Models\TugasModel;

class Home extends BaseController
{
    public function index123()
    {
        $tugasModel = new TugasModel();
        $data['tugas'] = $tugasModel->findAll();
        echo view('headerx');
        echo view('sidebar');
        echo view('index', $data);
        echo view('footer');
    }

    public function tambah()
    {
        echo view('headerx');
        echo view('sidebar');
        echo view('tambah');
        echo view('footer');
    }

    public function tambah_tugas()
    {
        $Tugasmodel = new TugasModel();
        $data = [
            'task_name' => $this->request->getPost('name'),
            'status' => 'belum',
            'priority' => $this->request->getPost('priority'),
            'created_at' => date('Y-m-d'),
            'deadline' => $this->request->getPost('deadline'),
        ];

        if ($Tugasmodel->insert($data)){
            return redirect()->to('/')->with('success','Tugas Berhasil Ditambahkan');
        } else {
            return redirect()->to('/')->with('error','Tugas Gagal Ditambahkan');
        }
    }

    public function update_status1($task_id)
    {
        $TugasModel = new TugasModel();
        $tugas = $TugasModel->find($task_id);

        if ($TugasModel->update($task_id, ['status' => 'selesai'])){
            return redirect()->to('/')->with('success','Status tugas berhasil diupdate');
        } else {
            return redirect()->to('/')->with('error', 'Status tugas gagal diupdate');
        }
    }

    public function edit1($task_id)
    {
        $tugasModel = new TugasModel();
        $tugas = $tugasModel->find($task_id);
        $data = [
            'tugas' => $tugas
        ];

        echo view('headerx');
        echo view('sidebar');
        echo view('edit',$data);
        echo view('footer');
    }

    public function update($task_id)
    {
        $tugasModel = new TugasModel();

        $data = [
            'task_name' => $this->request->getPost('task_name'),
            'priority' => $this->request->getPost('priority'),
            'deadline' => $this->request->getPost('deadline')
        ];

        if ($tugasModel->update($task_id, $data)) {
            return redirect()->to('/')->with('success', 'Tugas berhasil diupdate');
        } else {
            return redirect()->to('/')->with('error', 'Tugas gagal diupdate');
        }
    }

    public function delete1($task_id)
    {
        $tugasModel = new TugasModel();
        
        if ($tugasModel->delete($task_id)){
            return redirect()->to('/')->with('success', 'Tugas berhasil dihapus');
        } else {
            return redirect()->to('/')->with('error', 'Tugas gagal dihapus');
        }
    }
}