<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$CgusBrjuAjh6aA5W/oOD6uYv2B3EhKgQlXHzAXZp07u2kqQ.9JBZ6',
                'remember_token' => NULL,
                'created_at' => '2024-05-04 21:51:00',
                'updated_at' => '2024-05-04 21:51:00',
            ),
        ));
        
        
    }
}