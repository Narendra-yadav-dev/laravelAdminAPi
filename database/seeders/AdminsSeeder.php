<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Admin::create([
            'name'=> 'Kudosta',
            'company'=> 'Kudosta',
            'job'=> 'Kudosta',
            'address'=> 'Kudosta',
            'phone'=> '9251002241',
            'email'=> 'narendra@kudosta.com',
            'image'=> 'admin.jpg',
            'password'=> Hash::make('123456789'),
        ]);         
    }
}
