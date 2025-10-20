<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@example.com'],[
            'name'=>'Admin', 'phone'=>'01800000001', 'role'=>Role::ADMIN,
            'password'=>Hash::make('admin123'),
        ]);
        User::updateOrCreate(['email'=>'taxpayer@example.com'],[
            'name'=>'Tax Payer', 
            'phone'=>'01800000002', 
            'role'=>Role::TAXPAYER,
            'password'=>Hash::make('taxpayer123'),
        ]);
        User::updateOrCreate(['email'=>'auditor@example.com'],[
            'name'=>'Auditor', 
            'phone'=>'01800000003', 
            'role'=>Role::AUDITOR,
            'password'=>Hash::make('auditor123'),
        ]);
        User::updateOrCreate(['email'=>'accountant@example.com'],[
            'name'=>'Accountant', 
            'phone'=>'01800000004', 
            'role'=>Role::ACCOUNTANT,
            'password'=>Hash::make('account123'),
        ]);

    }

}
