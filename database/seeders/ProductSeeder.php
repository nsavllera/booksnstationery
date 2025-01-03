<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stationeryCategory = Category::firstOrCreate(['name' => 'Stationery']);
        $booksCategory = Category::firstOrCreate(['name' => 'Books']);

        Product::create([
            'name' => 'SAMPLE BOOK',
            'description' => ' ',
            'price' => 4.30,
            'image' => ' ',
            'category_id' => $booksCategory->id, 
        ]);

        Product::create([
            'name' => 'Faber-Castell Gel Pen RX - 2PC',
            'description' => '2 pc gel pen with smooth writing ink.',
            'price' => 4.30,
            'image' => 'fabercastellrx2pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Faber-Castell Correction Pen 8ML',
            'description' => '8ml correction pen, for clean correction.',
            'price' => 6.00,
            'image' => 'fabercastellcorrection8ml.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Zhi Xin Gel Ink Pen - 12PC',
            'description' => '1 box of Zhi Xin gel pen, containing 12 pens.',
            'price' => 7.90,
            'image' => 'zhixingelpen12pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'M&G 2B Pencil - 12PC',
            'description' => '1 box of M&G 2B pencils, containing 12 pencils.',
            'price' => 7.50,
            'image' => 'mng2bpencil12pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Faber-Castell Dust-Free Eraser',
            'description' => 'Dust-free eraser, for clean and messless correction.',
            'price' => 1.05,
            'image' => 'fabercastelleraser.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Stabilo Boss Highlighter',
            'description' => 'Neon yellow highlighter.',
            'price' => 3.20,
            'image' => 'stabilobosshighlighter.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Buncho Poster Colours - 12PC',
            'description' => 'Vibrant poster colours, 12 pieces per box',
            'price' => 20.40,
            'image' => 'bunchopostercolour.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Staedtler School Scissors',
            'description' => 'Scissors for school use.',
            'price' => 8.90,
            'image' => 'staedtlerscissor.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Plus Scissors',
            'description' => 'Smooth cut with easy hold. Plus Japan.',
            'price' => 8.40,
            'image' => 'plusscissor.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);
    }
}
