<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = [
            [
                'name' => 'Erik Cahya Pradana',
                'email' => 'erikcp38@gmail.com',
                'password' => bcrypt('master123lsp')
            ],
            [
                'name' => 'Admin LSP',
                'email' => 'master@gmail.com',
                'password' => bcrypt('master123lsp')
            ],

        ];

        foreach ($user as $row) {
            User::create($row);
        }
    }
}
