<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPassword extends Command
{
    protected $signature = 'admin:update-password';
    protected $description = 'Update admin user password';

    public function handle()
    {
        $user = User::where('email', 'admin@admin.com')->first();
        
        if (!$user) {
            $this->error('Admin user not found!');
            return 1;
        }
        
        $user->password = Hash::make('admin123');
        $user->isadmin = 1;
        $user->save();
        
        $this->info('Admin user updated successfully!');
        $this->info('Email: admin@admin.com');
        $this->info('Password: admin123');
        $this->info('isadmin: 1');
        
        return 0;
    }
}
