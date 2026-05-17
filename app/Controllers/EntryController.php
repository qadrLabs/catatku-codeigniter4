<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\EntryModel;


class EntryController extends BaseController
{
    public function index()
    {
        $entryModel = model(EntryModel::class);
        $entries = $entryModel->orderBy('created_at', 'DESC')->findAll();

        return view('entries/index', ['entries' => $entries]);
    }

    public function create()
    {
        return view('entries/create');
    }

    public function store()
    {
        $rules = [
            'title'   => 'required|max_length[255]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $entryModel = model(EntryModel::class);
        $entryModel->insert([
            'user_id' => session()->get('user_id'),
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/entries')->with('success', 'Entry saved successfully.');
    }


    public function show($id)
    {
        $entryModel = model(EntryModel::class);
        $entry = $entryModel->find($id);

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ( (int) $entry->user_id !== (int) session()->get('user_id')) {
            return $this->response->setStatusCode(403, 'Forbidden');
        }

        return view('entries/show', ['entry' => $entry]);
    }

}
