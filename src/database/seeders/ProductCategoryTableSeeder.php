<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = Product::find(1);
        $category1 = Category::where('name', 'メンズ')->first();
        $category2 = Category::where('name', 'アクセサリー')->first();

        if ($product1 && $category1) {
            $product1->categories()->attach($category1->id);
        }

        if ($product1 && $category2) {
            $product1->categories()->attach($category2->id);
        }

        $product2 = Product::find(2);
        $category3 = Category::where('name', '家電')->first();

        if ($product2 && $category3) {
            $product2->categories()->attach($category3->id);
        }

        $product3 = Product::find(3);
        $category4 = Category::where('name', 'キッチン')->first();

        if ($product3 && $category4) {
            $product3->categories()->attach($category4->id);
        }

        $product4 = Product::find(4);
        $category5 = Category::where('name', 'メンズ')->first();
        $category6 = Category::where('name', 'ファッション')->first();

        if ($product4 && $category5) {
            $product4->categories()->attach($category5->id);
        }

        if ($product4 && $category6) {
            $product4->categories()->attach($category6->id);
        }

        $product5 = Product::find(5);
        $category7 = Category::where('name', '家電')->first();
        $category8 = Category::where('name', 'ゲーム')->first();

        if ($product5 && $category7) {
            $product5->categories()->attach($category7->id);
        }

        if ($product5 && $category8) {
            $product5->categories()->attach($category8->id);
        }

        $product6 = Product::find(6);
        $category9 = Category::where('name', '家電')->first();
        $category10 = Category::where('name', 'おもちゃ')->first();

        if ($product6 && $category9) {
            $product6->categories()->attach($category9->id);
        }

        if ($product6 && $category10) {
            $product6->categories()->attach($category10->id);
        }

        $product7 = Product::find(7);
        $category11 = Category::where('name', 'ファッション')->first();
        $category12 = Category::where('name', 'レディース')->first();

        if ($product7 && $category11) {
            $product7->categories()->attach($category11->id);
        }

        if ($product7 && $category12) {
            $product7->categories()->attach($category12->id);
        }

        $product8 = Product::find(8);
        $category13 = Category::where('name', 'キッチン')->first();

        if ($product8 && $category13) {
            $product8->categories()->attach($category13->id);
        }

        $product9 = Product::find(9);
        $category14 = Category::where('name', 'インテリア')->first();
        $category15 = Category::where('name', 'キッチン')->first();

        if ($product9 && $category14) {
            $product9->categories()->attach($category14->id);
        }

        if ($product9 && $category15) {
            $product9->categories()->attach($category15->id);
        }

        $product10 = Product::find(10);
        $category16 = Category::where('name', 'レディース')->first();
        $category17 = Category::where('name', 'コスメ')->first();

        if ($product10 && $category16) {
            $product10->categories()->attach($category16->id);
        }

        if ($product10 && $category17) {
            $product10->categories()->attach($category17->id);
        }
    }
}
