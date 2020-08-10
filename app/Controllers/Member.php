<?php

namespace App\Controllers;

use App\Models\MemberModel;
use phpDocumentor\Reflection\Types\This;

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
            'title' => 'Tambah Member',
            'validation' => \Config\Services::validation()
        ];
        return view('member/create', $data);
    }

    public function save()
    {
        // Validate Foto
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar'
                ]
            ]
        ])) {
            // Validation
            return redirect()->to('/member/create')->withInput();
        }

        // Mabil Input Foto
        $foto = $this->request->getFile('foto');

        /**Jika Nama Random
         * $namaFoto = $foto->getRandomName();
         * $foto->move('img', $namaFoto);
         */

        if ($foto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            // Ambil Nama Foto
            $namaFoto = $foto->getName();
            // Move
            $foto->move('img');
        }

        $this->memberModel->save([
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
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
        // Ambil Data member
        $member = $this->memberModel->find($id);
        // Unlink Gambar dari Public Images
        if ($member['foto'] != 'default.png') {
            unlink('img/' . $member['foto']);
        }
        $this->memberModel->delete($id);
        session()->setFlashData('pesan', 'Member Berhasil Dihapus');
        return redirect()->to('/member/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Member',
            'member' => $this->memberModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('member/edit', $data);
    }

    public function update($id)
    {
        // Validate Foto
        if (!$this->validate([
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
                'errors' => [
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar',
                    'max_size' => 'Ukuran Foto Terlalu Besar'
                ]
            ]
        ])) {
            // Validation
            return redirect()->to('/member/edit/' . $id)->withInput();
        }

        // Ambil File Foto Baru
        $fotoBaru = $this->request->getFile('foto');
        // Ambil Nama Foto Lama
        $fotoLama = $this->request->getVar('fotoLama');

        // Jika tidak upload, pakai gambar lama
        if ($fotoBaru->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $fotoBaru->getName();
            $fotoBaru->move('img', $namaFoto);
            if ($fotoLama != 'default.png') {
                unlink('img/' . $fotoLama);
            }
        }

        // Save Data
        $this->memberModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'slug' => url_title($this->request->getVar('nama'), '-', true),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
        ]);
        session()->setFlashData('pesan', 'Member Berhasil Diubah');
        return redirect()->to('/member/index');
    }
}
