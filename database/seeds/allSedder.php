<?php

use Illuminate\Database\Seeder;

class allSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('roles')->insert([
            [
                'role' => 'admin'
            ],
            [
                'role' => 'doctor'
            ],
            [
                'role' => 'pharmacy'
            ],
            [
                'role' => 'user'
            ],

        ]);
        DB::table('users')->insert([
            [
                'name' => 'Ruhul',
                'email' => 'ruhul.ok@gmail.com',
                'password' => Hash::make(1234),
                'role_id' => 1
               
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(1234),
                'role_id' => 1
                
            ],
            [
                'name' => 'doctor',
                'email' => 'doctor@gmail.com',
                'password' => Hash::make(1234),
                'role_id' => 2
                
            ],
            [
                'name' => 'pharmacy',
                'email' => 'pharmacy@gmail.com',
                'password' => Hash::make(1234),
                'role_id' => 3
            ],

            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make(1234),
              
                'role_id' => 3
            ],

        ]);


        DB::table('task_levels')->insert([
            [
                'name' => 'Level 0'
            ],
            [
                'name' => 'Level 1'
            ],
            [
                'name' => 'Level 2'
            ],
            [
                'name' => 'Level 3'
            ],

        ]);
        DB::table('task_statuses')->insert([
            [
                'name' => 'running'
            ],
            [
                'name' => 'complete'
            ],
            [
                'name' => 'delay'
            ],
            [
                'name' => 'extended'
            ],
            [
                'name' => 'missing'
            ],

        ]);



    }
}
