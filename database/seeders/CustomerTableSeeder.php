<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [ 'email'=>'jockthan@gmail.com'],
            [ 'email'=>'mikado@gmail.com'],
            [ 'email'=>'ridi@gmail.com'],
            [ 'email'=>'prisca@mail.com'],
            [ 'email'=>'merdie@gmail.com'],
            [ 'email'=>'merveille@gmail.com'],
            [ 'email'=>'junior@gmail.com'],
            [ 'email'=>'brian@gmail.com'],
            [ 'email'=>'christelle@gmail.com'],
            [ 'email'=>'lionnel@mail.com'],
        ];
        Customer::insert($customers);
    }
}
