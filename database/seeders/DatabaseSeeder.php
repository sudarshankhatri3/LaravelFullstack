<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;        // Users must be inserted BEFORE orders, since orders has a
        // foreign key constraint on user_id referencing users.id

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                // Users must be inserted BEFORE orders, since orders has a
        // foreign key constraint on user_id referencing users.id
        $users = [
            // Admin -> id 1
            [
                'first_name' => 'Admin',
                'last_name'  => 'ShopEase',
                'email'      => 'admin@shopease.com',
                'password'   => Hash::make('admin123'),
                'address'    => '123 Admin Street, Kathmandu',
                'status'     => 'active',
                'role'       => 'admin',
            ],
            // Customers -> ids 2-5
            [
                'first_name' => 'Sudarshan',
                'last_name'  => 'Khatri',
                'email'      => 'sudarshan@gmail.com',
                'password'   => Hash::make('sudu@123'),
                'address'    => '456 Customer Lane, Pokhara',
                'status'     => 'active',
                'role'       => 'customer',
            ],
            [
                'first_name' => 'Ram',
                'last_name'  => 'Sharma',
                'email'      => 'ram@gmail.com',
                'password'   => Hash::make('ram@123'),
                'address'    => '789 Main Road, Lalitpur',
                'status'     => 'active',
                'role'       => 'customer',
            ],
            [
                'first_name' => 'Sita',
                'last_name'  => 'Thapa',
                'email'      => 'sita@gmail.com',
                'password'   => Hash::make('sita@123'),
                'address'    => '321 Park Avenue, Bhaktapur',
                'status'     => 'active',
                'role'       => 'customer',
            ],
            [
                'first_name' => 'Hari',
                'last_name'  => 'Bahadur',
                'email'      => 'hari@gmail.com',
                'password'   => Hash::make('hari@123'),
                'address'    => '654 Old Street, Kathmandu',
                'status'     => 'suspended',
                'role'       => 'customer',
            ],
            // Vendors -> ids 6-7
            [
                'first_name' => 'Bikash',
                'last_name'  => 'Vendor',
                'email'      => 'bikash@shopease.com',
                'password'   => Hash::make('bikash@123'),
                'address'    => '12 Vendor Plaza, Kathmandu',
                'status'     => 'active',
                'role'       => 'vendor',
            ],
            [
                'first_name' => 'Maya',
                'last_name'  => 'Gurung',
                'email'      => 'maya@shopease.com',
                'password'   => Hash::make('maya@123'),
                'address'    => '99 Vendor Street, Pokhara',
                'status'     => 'active',
                'role'       => 'vendor',
            ],
        ];
 
        DB::table('users')->insert($users);
 
        // user_id values below are shifted +1 vs. the original array
        // because Admin now occupies id 1, pushing customers to 2-5
        $orders = [
            [
                'user_id'      => 2, // Sudarshan
                'product_id'   => 1,
                'title'        => 'iPhone 15 Pro',
                'image'        => 'iphone15.jpg',
                'quantity'     => 1,
                'unit_price'   => 999.99,
                'total_amount' => 999.99,
                'status'       => 'pending'
            ],
            [
                'user_id'      => 2, // Sudarshan
                'product_id'   => 2,
                'title'        => 'Samsung Galaxy S24',
                'image'        => 'samsung_s24.jpg',
                'quantity'     => 2,
                'unit_price'   => 799.99,
                'total_amount' => 1599.98,
                'status'       => 'approved'
            ],
            [
                'user_id'      => 3, // Ram
                'product_id'   => 3,
                'title'        => 'Sony WH-1000XM5 Headphones',
                'image'        => 'sony_headphones.jpg',
                'quantity'     => 1,
                'unit_price'   => 349.99,
                'total_amount' => 349.99,
                'status'       => 'shipped'
            ],
            [
                'user_id'      => 3, // Ram
                'product_id'   => 4,
                'title'        => 'MacBook Air M3',
                'image'        => 'macbook_air.jpg',
                'quantity'     => 1,
                'unit_price'   => 1299.99,
                'total_amount' => 1299.99,
                'status'       => 'delivered'
            ],
            [
                'user_id'      => 4, // Sita
                'product_id'   => 1,
                'title'        => 'iPhone 15 Pro',
                'image'        => 'iphone15.jpg',
                'quantity'     => 3,
                'unit_price'   => 999.99,
                'total_amount' => 2999.97,
                'status'       => 'pending'
            ],
            [
                'user_id'      => 4, // Sita
                'product_id'   => 5,
                'title'        => 'Nike Air Max 270',
                'image'        => 'nike_airmax.jpg',
                'quantity'     => 2,
                'unit_price'   => 150.00,
                'total_amount' => 300.00,
                'status'       => 'shipped'
            ],
            [
                'user_id'      => 5, // Hari
                'product_id'   => 6,
                'title'        => 'Dell XPS 15 Laptop',
                'image'        => 'dell_xps.jpg',
                'quantity'     => 1,
                'unit_price'   => 1899.99,
                'total_amount' => 1899.99,
                'status'       => 'delivered'
            ],
            [
                'user_id'      => 5, // Hari
                'product_id'   => 2,
                'title'        => 'Samsung Galaxy S24',
                'image'        => 'samsung_s24.jpg',
                'quantity'     => 1,
                'unit_price'   => 799.99,
                'total_amount' => 799.99,
                'status'       => 'approved'
            ],
        ];
 
        DB::table('orders')->insert($orders);
    }
} 
