<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "type" => "Applicant",
            "lastname" => "Faustino",
            "firstname" => "Arvin",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "a@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("a")
        ]);

        User::create([
            "type" => "Member",
            "lastname" =>  "Pastor",
            "firstname" => "Jochelle Mae",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "j@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("j")
        ]);

        User::create([
            "type" => "Admin",
            "lastname" =>  "Jumarang",
            "firstname" => "Leo",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "admin@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Admin")
        ]);

        User::create([
            "type" => "Manager",
            "lastname" =>  "Casile",
            "firstname" => "Michelle",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "manager@cgumc.com.ph",
            "contact" => "12345678910",
            "password" => Hash::make("Manager")
        ]);

        User::create([
            "type" => "Customer",
            "lastname" =>"Batayon",
            "firstname" => "Elisha",
            "age" => 22,
            "address" => "Pamantasan ng Cabuyao",
            "email" => "e@gmail.com",
            "contact" => "12345678910",
            "password" => Hash::make("e")
        ]);

        Product::create([
            "id" => 1,
            "prodname" =>  "Arabica",
            "supplierName" => "Mae",
            "quantity" => 100,
            "unitprice" => 50,
            "details" => "Lorem ipsum",
            "dateofstoring" => "2023-03-12"
        ]);

        Delivery::create([
            "id" => 1,
            "supplierName" => "Mae",
            "quantity" => 20,
            "prodName" => "Barako",
            "status" => "On Deliver",
            "deliverydate" => "2022-12-12",
        ]);

        Delivery::create([
            "id" => 2,
            "supplierName" => "Mae",
            "quantity" => 20,
            "prodName" => "Arabica",
            "status" => "Delivered",
            "deliverydate" => "2023-09-15",
        ]);

    }
}
