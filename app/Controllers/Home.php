<?php

namespace App\Controllers;

use App\Models\TodoModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model =  new TodoModel();

        $data = [
            'todos' => $model->findAll(),
            'title' => 'My Todo List'
        ];
        return view('home', $data);
    }
}
