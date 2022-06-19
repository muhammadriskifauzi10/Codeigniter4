<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Detail extends BaseController
{
    public function index($slug)
    {
        $title = "Detail page for $slug";

        // Blog repost start 
        $loop = new BlogModel();
        $blog = $loop->where('slug', $slug)->first();
        // Blog repost end 

        if($blog == null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('detail', [
            'title' => $title,
            'blog' => $blog
        ]);
    }

    public function delete($id) {

        // Blog repost start 
        $loop = new BlogModel();


        $find = $loop->find($id);

        if($find['sampul'] != 'default.jpg') {
            unlink('img/' . $find['sampul']);
        }

        $blog = $loop->delete($id);
        // Blog repost end 

        session()->setFlashdata('message', 'Data berhasil dihapus!');

        return redirect()->to('/');
    }
}
