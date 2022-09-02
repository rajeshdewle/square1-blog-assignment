<?php

namespace App\Console\Commands;

use App\Models\User;
use Exception;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user to save against REST api posts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Do you wand to create admin user manualy?')) {
            $name = $this->ask('What is your name?');
            $email = $this->ask('Your email?');
            $password = $this->secret('Your password? (minimum 8 characters)');
            try {
                User::factory()->create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);

                $this->info('Admin user created successfully!');
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }
        } else {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@123'),
            ]);
            $this->info('Created default user by system using password "admin@123"');
        }
        $this->table(
            ['Name', 'Email'],
            User::all(['name', 'email'])->toArray()
        );
    }
}
