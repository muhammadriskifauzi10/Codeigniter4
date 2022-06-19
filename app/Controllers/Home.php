<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Home extends BaseController
{
    public function index()
    {
        $current_page = $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1;

        $title = "Home page";

        // Blog repost start 
        $loop = new BlogModel();
        //$blog = $loop->findAll();
        // Blog repost end 
        
        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $list_blog = $loop->orderBy('id', 'DESC')
            ->like('judul', $keyword)
            ->orLike('author', $keyword)
            ->paginate(10, 'blog');
        }
        else {
            $list_blog = $loop->orderBy('id', 'DESC')->paginate(10, 'blog');
        }

        return view('home', [
            'current_page' => $current_page,
            'title' => $title,
            'blog' => $list_blog,
            'pager' => $loop->pager,
            'keyword' => $keyword
        ]);
    }
}
