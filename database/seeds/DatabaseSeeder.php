<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "bhushan@admin.com";
        $admin->password = bcrypt("admin123");
        $admin->visible_password = "admin123";
        $admin->email_verified_at = NOW();
        $admin->occupation = "MD";
        $admin->address = "India";
        $admin->phone = "8806658974";
        $admin->is_admin = 1;
        $admin->save();
    }
}
