<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assettype;
use App\Models\Asset;
use App\Models\Assetimage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //dashboard function
    public function home(){
        $atype = Assettype::all();
        $chartdata="";
        foreach($atype as $a)
        {
            $assettype = Assettype::find($a->id);
            $assets = $assettype->asset;
            $noofasset = count($assets);
            $chartdata.="['".$a->name."',".$noofasset."],";
        }
        $notactive = Asset::select('is_active')->where('is_active',0)->count();
        $active = Asset::select('is_active')->where('is_active',1)->count();
        $arr['chartdata']=rtrim($chartdata,",");
        return view('dashboard',$arr,['active'=>$active])->with('notactive',$notactive);
    }
    
    //dummy
    public function pie()
    {
        $data=Asset::all();
        return view('piechartdemo',['data'=>$data]);
    }

    //dummy
    public function downloadcsv()
    {
        $catdata=Asset::all();
        return view('download',['catdata'=>$catdata]);
    }



}
