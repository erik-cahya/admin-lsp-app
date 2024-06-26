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
                'name' => 'Admin LSP',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123lsp')
            ]
        ];

        foreach ($user as $row) {
            User::create($row);
        }
    }
}
