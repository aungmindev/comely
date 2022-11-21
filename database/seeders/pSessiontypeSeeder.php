<?php

namespace Database\Seeders;

use App\Models\Sessiontype;
use Illuminate\Database\Seeder;

class pSessiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['ပုံမှန်အစည်းအဝေး' , 'Regular Session'],
            ['အထူးအစည်းအဝေး' , 'Special Session'],
            ['အရေးပေါ်အစည်းအဝေး' , 'Emergency Session'],
        ];

        foreach($datas as $data){
            Sessiontype::create([
                'name' => $data[0],
                'name_en' => $data[1],
            ]);
        }
        
    }
}
