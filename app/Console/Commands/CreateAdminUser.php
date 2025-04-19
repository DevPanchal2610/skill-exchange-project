<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'create:admin';
    protected $description = 'Create an admin user';

    public function handle()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'isadmin' => 1,
            'isactive' => 1,
            'city_id' => 1 
        ]);

        $this->info('Admin user created successfully!');
        $this->info('Email: admin@admin.com');
        $this->info('Password: admin123');
    }
}
