<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assettype;
use App\Models\Asset;
use App\Models\Assetimage;

class AssettypeController extends Controller
{
    //adding assettype view
    public function addAssetType()
    {
        return view('addassettype');
    }

    //validate and insert assettype
    public function postaddAssetType(Request $req)
    {
        $validateData=$req->validate(
            [
                'name'=>'required|unique:assettypes',
                'description'=>'max:500'
            ],[
                'name.required'=>'name is required',
                'description.max'=>'maximum characters is 500',
                'name.unique'=>'name should be unique',
            ]
        );
        if($validateData)
        {
            $cat=new Assettype();
            $cat->name=$req->name;
            $cat->description=$req->description;
            if($cat->save()){
                //return redirect("/dashboard/assettype")
                return back()->with('success','Assettype Added');
            }
            else {
                return back()->with('errMsg','Assettype Not Added');
            } 
        }
        else
        {
            return back()->with('errMsg','fields data are Invalid');
        }
    }

    //delete assettype
    public function deleteAssetType($id){
        $catdata=Assettype::where('id',$id)->first();
        $data = Asset::where('assettype_id',$id)->get();
        foreach($data as $da)
        {
            $d = $da['id'];
            $fname = $da['image'];
            $path=public_path()."/uploads/".$fname;
            //unlink($path);
            Assetimage::where('asset_id',$d)->delete();
        }
        Asset::where('assettype_id',$id)->delete();
        $cat=Assettype::find($id);
        if($cat->delete())
        {
            return back()->with('success','Asset type deleted');
        }
        else
        {
            return "Asset type not deleted";
        }
    }

    //edit assettype view 
    public function editAssetType($id)
    {
        $catdata=Assettype::where('id',$id)->first();
        return view('editassettype',['catdata'=>$catdata]);
    }

    //update assettype
    public function updateAssetType(Request $req)
    {
        Assettype::where('id',$req->id)->update([
        'name'=>$req->name,
        'description'=>$req->description
        ]);
        return redirect('/home/showAssetType');
    }

    //display assettypes 
    public function showAssetType()
    {
        $catdata=Assettype::all();
        return view('assettype',['catdata'=>$catdata]);
    }

    //list assettypes
    public function listAssetType()
    {
        $catdata=Assettype::paginate(3);
        return view('assettypelist',['catdata'=>$catdata]);
    }

    

}
