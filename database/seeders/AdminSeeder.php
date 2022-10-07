<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
            'id'=>1,
            'name'=>'Ardhas',
            'email'=>'ardhas@gmail.com',
            'password'=>Hash::make('ardhastech@123'),
            'created_at'=>now(),
            'updated_at'=>now(),


        ], [
            'id'=>2,
            'name'=>'Gowtham',
            'email'=>'gowtham@gmail.com',
            'password'=>Hash::make('gowtham@123'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]
    ]);
    }
}
