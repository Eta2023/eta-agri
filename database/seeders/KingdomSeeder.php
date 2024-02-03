<?php

namespace Database\Seeders;

use App\Models\Kingdom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KingdomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Kingdom::create([
            'nameAr'=>'البكتيريا',
            'nameEng'=>'Eubacteria',        
        ]); 
        Kingdom::create([
            'nameAr'=>'الطلائعيات',
            'nameEng'=>'Protista',        
        ]);
        Kingdom::create([
            'nameAr'=>'النباتات',
            'nameEng'=>'Plantae',        
        ]);
        Kingdom::create([
            'nameAr'=>'الفطريات',
            'nameEng'=>'Fungi',        
        ]);
        Kingdom::create([
            'nameAr'=>'الحيوانات',
            'nameEng'=>'Animalia',        
        ]);  
     }
}
