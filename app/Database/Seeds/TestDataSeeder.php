<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use App\Models\EntryModel;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        // Create a test user
        $userModel = model(UserModel::class);
        $userModel->insert([
            'name'     => 'Budi',
            'email'    => 'budi@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
        ]);

        $userId = $userModel->getInsertID();

        // Create test entries
        $entryModel = model(EntryModel::class);

        $entryModel->insert([
            'user_id' => $userId,
            'title'   => 'My first entry',
            'content' => 'This is my very first journal entry. Feels great to get started!',
        ]);

        $entryModel->insert([
            'user_id' => $userId,
            'title'   => 'Learning CodeIgniter',
            'content' => 'Today I learned about CodeIgniter models. Interacting with the database is clean and straightforward.',
        ]);

        $entryModel->insert([
            'user_id' => $userId,
            'title'   => 'Weekend plans',
            'content' => 'Planning to finish the CodeIgniter course this weekend and maybe start a side project.',
        ]);
    }
}
