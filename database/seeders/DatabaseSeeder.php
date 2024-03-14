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
            "type" => "Applicant",
            "last_name" => "Faustino",
            "first_name" => "Arvin",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "a@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("a")
        ]);

        User::create([
            "type" => "Supplier",
            "last_name" =>  "Pastor",
            "first_name" => "Jochelle Mae",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "j@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("j")
        ]);

        User::create([
            "type" => "Admin",
            "last_name" =>  "Jumarang",
            "first_name" => "Leo",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "admin@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Admin")
        ]);

        User::create([
            "type" => "Manager",
            "last_name" =>  "Casile",
            "first_name" => "Michelle",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "manager@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Manager")
        ]);

        User::create([
            "type" => "Customer",
            "last_name" => "Batayon",
            "first_name" => "Elisha",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "e@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("e")
        ]);

        Product::create([
            "id" => 1,
            "name" =>  "Arabica",
            "supplier_name" => "Jochelle Mae",
            "quantity" => 100,
            "unit_price" => 50,
            "details" => "Lorem ipsum",
            "date_of_storing" => "2023-03-12"
        ]);

        Product::create([
            "id" => 2,
            "name" =>  "Robusta",
            "supplier_name" => "Jochelle Mae",
            "quantity" => 100,
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
            "quantity" => 100,
            "date" => "2023-12-15"
        ]);

        Coffeebeans::create([
            "id" => 2,
            "coffee_name" =>  "Robusta",
            "quantity" => 100,
            "date" => "2023-12-15"
        ]);

        Sales::create([
            "id" => 1,
            "customer_name" =>  "Elisha",
            "product_name" => "Robusta",
            "product_quantity" => "10",
            "date" => "2023-12-15"
        ]);
    }
}
