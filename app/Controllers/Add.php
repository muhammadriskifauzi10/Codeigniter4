<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;

class Add extends BaseController
{
    public function index()
    {
        $title = "Add blog";

        // Blog repost start 
        $loop = new CategoryModel();
        $category = $loop->findAll();
        // Blog repost end 

        return view('add', [
            'title' => $title,
            'category' => $category,
            'validation' => \Config\Services::validation()
        ]);
    }
    public function save() {

        dd($this->request->getVar('category'));
        
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blog.judul]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ],
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar',
                    'is_image' => 'Yang anda masukkan bukan {field}',
                    'mime_in' => '{field} hanya boleh ber-extensi jpg'
                ]
            ]
        ])) {
            //$validation = \config\Services::validation();
            //return redirect()->to('/add')->withInput()->with('validation', $validation);
            return redirect()->to('/add')->withInput();
        }

        $file_sampul = $this->request->getFile('sampul');

        if($file_sampul->getError() == 4) {
            $sampul = 'default.jpg';
        }
        else {
            $sampul = $file_sampul->getRandomName();
            $file_sampul->move('img', $sampul);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);

        $blog = new BlogModel();

        $blog->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'category' => $this->request->getVar('category'),
            'sampul' => $sampul
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan!');

        return redirect()->to('/');
    }
}
