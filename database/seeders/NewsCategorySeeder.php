<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsCats = ['Breaking News' , 'Hot News' , 'Latest News'];
        foreach($newsCats as $newsCat){
            NewsCategory::create([
                'name' => $newsCat,
            ]);
        }
        
    }
}
