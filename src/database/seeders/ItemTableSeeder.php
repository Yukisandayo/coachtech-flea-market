<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=[
            'user_id' => 1,
            'name'=>'腕時計',
            'price'=>'15000',
            'description'=>'スタイリッシュなデザインのメンズ腕時計',
            'image'=>'Armani_Mens_Clock.jpg',
            'condition'=>'良好',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'HDD',
            'price'=>'5000',
            'description'=>'高速で信頼性の高いハードディスク',
            'image'=>'HDD_Hard_Disk.jpg',
            'condition'=>'目立った傷や汚れなし',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'玉ねぎ3束',
            'price'=>'300',
            'description'=>'新鮮な玉ねぎ3束のセット',
            'image'=>'Onions.jpg',
            'condition'=>'やや傷や汚れあり',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'革靴',
            'price'=>'4000',
            'description'=>'クラシックなデザインの革靴',
            'image'=>'Leather_shoes_Product_Photo.jpg',
            'condition'=>'状態が悪い',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'ノートPC',
            'price'=>'45000',
            'description'=>'高性能なノートパソコン',
            'image'=>'Laptop.jpg',
            'condition'=>'良好',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'マイク',
            'price'=>'8000',
            'description'=>'高音質のレコーディング用マイク',
            'image'=>'Music_Mic.jpg',
            'condition'=>'目立った傷や汚れなし',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'ショルダーバッグ',
            'price'=>'3500',
            'description'=>'おしゃれなショルダーバッグ',
            'image'=>'Purse_fashion_pocket.jpg',
            'condition'=>'やや傷や汚れあり',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'タンブラー',
            'price'=>'500',
            'description'=>'使いやすいタンブラー',
            'image'=>'Tumbler_souvenir.jpg',
            'condition'=>'状態が悪い',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'コーヒーミル',
            'price'=>'4000',
            'description'=>'手動のコーヒーミル',
            'image'=>'Coffee_Grinder.jpg',
            'condition'=>'良好',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
        $product=[
            'user_id' => 1,
            'name'=>'メイクセット',
            'price'=>'2500',
            'description'=>'便利なメイクアップセット',
            'image'=>'makeup_set.jpg',
            'condition'=>'目立った傷や汚れなし',
            'is_sold' => false,
        ];
        DB::table('products')->insert($product);
    }
}
