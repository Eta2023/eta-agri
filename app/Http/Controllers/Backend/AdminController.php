<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Kingdom;
use App\Models\Phylum;





class AdminController extends Controller
{
    public function homeDashboard(){
      
        $kingdomId1 = 1; 
        $kingdom1 = Kingdom::find($kingdomId1);
        $phylumCount1 = Phylum::whereHas('kingdom', function ($query) use ($kingdomId1) {
            $query->where('id', $kingdomId1);
        })->get();

        $kingdomId2 = 2; 
        $kingdom2 = Kingdom::find($kingdomId2);
        $phylumCount2 = Phylum::whereHas('kingdom', function ($query) use ($kingdomId2) {
            $query->where('id', $kingdomId2);
        })->get();
       

        $kingdomId3 = 3; 
        $kingdom3 = Kingdom::find($kingdomId3);
        $phylumCount3 = Phylum::whereHas('kingdom', function ($query) use ($kingdomId3) {
            $query->where('id', $kingdomId3);
        })->get();

        $kingdomId4 = 4; 
        $kingdom4 = Kingdom::find($kingdomId4);
        $phylumCount4 = Phylum::whereHas('kingdom', function ($query) use ($kingdomId4) {
            $query->where('id', $kingdomId4);
        })->get();
        return view('dashboard.pages.index', compact('phylumCount1','phylumCount2','phylumCount3','phylumCount4'));

    }
}
