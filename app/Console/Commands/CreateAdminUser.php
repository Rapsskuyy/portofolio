<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {--name=} {--email=}';

    protected $description = 'Create or promote one administrator account.';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Admin name');
        $email = $this->option('email') ?: $this->ask('Admin email');
        $password = $this->secret('Admin password (minimum 12 characters)');

        if (! is_string($name) || trim($name) === '') {
            $this->error('Admin name is required.');

            return self::FAILURE;
        }

        if (! is_string($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('A valid admin email is required.');

            return self::FAILURE;
        }

        if (! is_string($password) || strlen($password) < 12) {
            $this->error('Admin password must contain at least 12 characters.');

            return self::FAILURE;
        }

        $user = User::firstOrNew(['email' => strtolower($email)]);
        $user->name = trim($name);
        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();

        $this->info('Administrator account is ready.');

        return self::SUCCESS;
    }
}
