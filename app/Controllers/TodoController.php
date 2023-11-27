<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TodoModel;

class TodoController extends BaseController
{
    protected $TodoModel;

    public function __construct()
    {
        $this->TodoModel = new TodoModel();
    }

    public function createPage()
    {
        return view('create_todo');
    }

    public function editPage($id)
    {
        $data = [
            'title' => 'Edit Todo',
            'todo' => $this->TodoModel->find($id)
        ];

        if(!$data['todo'])
            return redirect()->to('/')->with('error', 'Todo not found!');
        
        return view('edit_todo', $data);
    }

    public function save()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'created_at' => date('Y-m-d H:i:s'), // Current date and time
            'updated_at' => date('Y-m-d H:i:s') // Current date and time
        ];

        $this->TodoModel->save($data);
        return redirect()->to('/');
    }

    public function delete($id)
    {
        if ($this->TodoModel->find($id)) {
            // Delete the record
            $this->TodoModel->delete($id);

            // Redirect back to the list page or show a success message
            return redirect()->to('/')->with('success', 'Todo deleted successfully!');
        } else {
            // Redirect back to the list page with an error message
            return redirect()->to('/')->with('error', 'Todo not found!');
        }
    }

    public function edit($id){
        if ($this->TodoModel->find($id)) {
            $now = date('Y-m-d H:i:s');

            $data = [
                'title' => $this->request->getPost('title'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->TodoModel->update($id, $data);

            // Redirect back to the list page or show a success message
            return redirect()->to('/')->with('success', 'Todo edited successfully!');
        } else {
            // Redirect back to the list page with an error message
            return redirect()->to('/')->with('error', 'Todo not found!');
        }
    }
}
