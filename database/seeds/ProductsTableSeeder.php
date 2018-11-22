<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $product = new \App\Product([
        'name' => 'Kojine 1',
        'description' => 'jajdasjkdfaskfkajsfh',
        'price' => 20,
        'image' => 'https://i.imgur.com/PeD24TG.jpg'
      ]);
      $product->save();
      $product = new \App\Product([
        'name' => 'Kojine 2',
        'description' => 'jajdasjkdfas',
        'price' => 20,
        'image' => 'https://i.imgur.com/PeD24TG.jpg'
      ]);
      $product->save();
      $product = new \App\Product([
        'name' => 'Kojine 3',
        'description' => 'jajdasjkdfaskfka',
        'price' => 20,
        'image' => 'https://i.imgur.com/PeD24TG.jpg'
      ]);
      $product->save();
    }
}
