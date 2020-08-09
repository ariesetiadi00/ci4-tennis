<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home'];
        return view('pages/index', $data);
    }
    public function about()
    {
        $data = ['title' => 'About'];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'alamat' => [
                [
                    'nama' => 'Rumah',
                    'jalan' => 'Jl. Danau Buyan',
                    'desa' => 'Mengwi',
                    'kab' => 'Badung'
                ],
                [
                    'nama' => 'Kantor',
                    'jalan' => 'Jl. Ngurah Rai',
                    'desa' => 'Renon',
                    'kab' => 'Denpasar'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
