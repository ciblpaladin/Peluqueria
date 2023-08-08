<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(500)->create();
    }

    //php artisan db:seed --class=RolTableSeeder
    //php artisan db:seed --class=StatuTableSeeder 
    //php artisan db:seed --class=UserTableSeeder 
    //php artisan db:seed --class=CityTableSeeder 
    //php artisan db:seed --class=CampusTableSeeder  
    //php artisan db:seed  --class=ServiceTableSeeder 
    //php artisan db:seed --class=ClientTableSeeder
    //php artisan db:seed --class=DiaryTableSeeder    

    
    
    
 
}
