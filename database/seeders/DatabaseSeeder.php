<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
           // Create a user
           $user = User::factory()->create();

         // Create some accounts for the user
        $accounts = Account::factory()->count(3)->create(['user_id' => $user->id]);
        
         // Create some transactions for each account
         foreach ($accounts as $account) {
            Transaction::factory()->count(5)->create(['account_id' => $account->id]);
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
