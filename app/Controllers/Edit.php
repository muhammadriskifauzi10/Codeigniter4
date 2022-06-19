<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Edit extends BaseController
{
    public function index($slug)
    {
        $title = "Detail page for $slug";

        // Blog repost start 
        $loop = new BlogModel();
        $blog = $loop->where('slug', $slug)->first();
        // Blog repost end 

        if ($blog == null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('edit', [
            'title' => $title,
            'blog' => $blog,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function update($id)
    {
        $judul_lama = $this->request->getVar('judul_lama');

        if($judul_lama == $this->request->getVar('judul')) {
            $role_rules = 'required';
        }
        else {
            $role_rules = 'required|is_unique[blog.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $role_rules,
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
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
            //return redirect()->to('/edit' . '/' .$this->request->getVar('slug'))->withInput()->with('validation', $validation);

            return redirect()->to('/edit' . '/' .$this->request->getVar('slug'))->withInput();
        }

        $file_sampul = $this->request->getFile('sampul');

        if($file_sampul->getError() == 4) {
            $sampul_baru = $this->request->getVar('sampul_lama');
        }
        else {
            $sampul_baru = $file_sampul->getRandomName();

            $file_sampul->move('img', $sampul_baru);

            if ($this->request->getVar('sampul_lama') != 'default.jpg') {
                unlink('img/' . $this->request->getVar('sampul_lama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $blog = new BlogModel();
        
        $blog->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'sampul' => $sampul_baru
        ]);

        session()->setFlashdata('message', 'Data berhasil di update!');

        return redirect()->to('/');
    }

}
