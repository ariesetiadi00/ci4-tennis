<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Member',
            'member' => $this->memberModel->getMember()
        ];

        return view('member/index', $data);
    }

    public function detail($id, $slug)
    {
        $data = [
            'title' => 'Detail Member',
            'member' => $this->memberModel->find($id)
        ];
        if (empty($data['member'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Member Bernama ' . $slug . ' Tidak Terdaftar');
        }
        return view('member/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Member'
        ];
        return view('member/create', $data);
    }

    public function save()
    {
        $this->memberModel->save([
            'nama' => $this->request->getVar('nama'),
            'foto' => $this->request->getVar('foto'),
            'slug' => url_title($this->request->getVar('nama'), '-', true),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'tgl_join' => date('Y-m-d')
        ]);

        session()->setFlashData('pesan', 'Member Baru Berhasil Ditambahkan');

        return redirect()->to('/member/index');
    }

    public function delete($id)
    {
        $this->memberModel->delete($id);
        session()->setFlashData('pesan', 'Member Berhasil Dihapus');
        return redirect()->to('/member/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Member',
            'member' => $this->memberModel->find($id)
        ];
        return view('member/edit', $data);
    }

    public function update($id)
    {
        $this->memberModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'foto' => $this->request->getVar('foto'),
            'slug' => url_title($this->request->getVar('nama'), '-', true),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
        ]);

        session()->setFlashData('pesan', 'Member Berhasil Diubah');

        return redirect()->to('/member/index');
    }
}
