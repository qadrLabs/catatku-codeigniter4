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
        $entry = $this->findOwnedEntry($id);
        return view('entries/show', ['entry' => $entry]);
    }

    public function edit($id)
    {
        $entry = $this->findOwnedEntry($id);
        return view('entries/edit', ['entry' => $entry]);
    }

    public function update($id)
    {
        $entry = $this->findOwnedEntry($id);

        $rules = [
            'title'   => 'required|max_length[255]',
            'content' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $entryModel = model(EntryModel::class);
        $entryModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/entries/' . $id)->with('success', 'Entry updated successfully.');
    }

    public function destroy($id)
    {
        $entry = $this->findOwnedEntry($id);

        $entryModel = model(EntryModel::class);
        $entryModel->delete($id);

        return redirect()->to('/entries')->with('success', 'Entry deleted successfully.');
    }

    private function findOwnedEntry($id)
    {
        $entryModel = model(EntryModel::class);
        $entry = $entryModel->find($id);

        if (!$entry) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ( (int) $entry->user_id !== (int) session()->get('user_id')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return $entry;
    }


}
