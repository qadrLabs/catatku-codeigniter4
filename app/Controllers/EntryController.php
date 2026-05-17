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
