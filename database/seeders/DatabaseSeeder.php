<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\coffeebeans;
use App\Models\User;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\Sales;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "type" => "applicant",
            "last_name" => "Faustino",
            "first_name" => "Arvin",
            "birthdate"=> "2002-01-01",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "a@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("a"),
            "plain_password" => "a"
        ]);

        User::create([
            "type" => "supplier",
            "last_name" =>  "Pastor",
            "first_name" => "Jochelle Mae",
            "birthdate"=> "2002-01-01",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "j@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("j"),
            "plain_password" => "j"
        ]);

        User::create([
            "type" => "admin",
            "last_name" =>  "Jumarang",
            "first_name" => "Leo",
            "birthdate"=> "2002-01-01",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "admin@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Admin"),
            "plain_password" => "Admin"
        ]);

        User::create([
            "type" => "manager",
            "last_name" =>  "Casile",
            "first_name" => "Michelle",
            "birthdate"=> "2002-01-01",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "manager@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Manager"),
            "plain_password" => "Manager"
        ]);

        User::create([
            "type" => "customer",
            "last_name" => "Batayon",
            "first_name" => "Elisha",
            "birthdate"=> "2002-01-01",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "e@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("e"),
            "plain_password" => "e"
        ]);

        Product::create([
            "id" => 1,
            "name" =>  "Brewed Arabica",
            "quantity" => 100,
            "unit_price" => 50,
            "details" => "Lorem ipsum",
            "date_of_storing" => "2023-03-12"
        ]);

        Product::create([
            "id" => 2,
            "name" =>  "Powdered Robusta",
            "quantity" => 5,
            "unit_price" => 50,
            "details" => "Lorem ipsum",
            "date_of_storing" => "2023-03-12"
        ]);

        Delivery::create([
            "id" => 1,
            "supplier_name" => "Jochelle Mae",
            "quantity" => 20,
            "product_name" => "Robusta",
            "status" => "On Deliver",
            "delivery_date" => "2022-12-12",
        ]);

        Delivery::create([
            "id" => 2,
            "supplier_name" => "Jochelle Mae",
            "quantity" => 20,
            "product_name" => "Arabica",
            "status" => "Delivered",
            "delivery_date" => "2023-09-15",
        ]);

        Coffeebeans::create([
            "id" => 1,
            "coffee_name" =>  "Arabica",
            "supplier_name" => "Jochelle Mae",
            "quantity" => 100,
            "date" => "2023-12-15"
        ]);

        Coffeebeans::create([
            "id" => 2,
            "coffee_name" =>  "Robusta",
            "supplier_name" => "Jochelle Mae",
            "quantity" => 100,
            "date" => "2023-12-15"
        ]);

        Sales::create([
            "id" => 1,
            "customer_name" =>  "Elisha",
            "product_name" => "Robusta",
            "product_quantity" => "10",
            "price" => "20",
            "date" => "2023-12-15"
        ]);
    }
}
