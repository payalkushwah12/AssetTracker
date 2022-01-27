<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assettype;
use App\Models\Asset;
use App\Models\Assetimage;

class AssetController extends Controller
{
    //add assets view
    public function addAsset()
    {
        $data = Assettype::all();
        return view('addasset',['data'=>$data]);
    }

    //validate and insert assets
    public function postaddAsset(Request $req)
    {
        $validateData=$req->validate(
            [
                'a_name'=>'required|unique:assets',
                'type'=>'required|',
            ],[
                'a_name.required'=>'asset name is required',
                'a_name.unique'=>'name should be unique',
                'type.required'=>'asset type is required',
            ]
        );
        $cat = new Asset;
        if($validateData)
        {
            $cat->a_name=$req->a_name;
            $cat->a_code=$req->code;
            $cat->assettype_id = $req->type;
            $cat->is_active = $req->radio;
            if($cat->save())
            {
                $images = $req->file('images');
                if(!empty($images))
                {
                    $dest=public_path('/uploads');
                    foreach($images as $item)
                    {
                        $fname="Image-".rand()."-".time().".".$item->extension();
                        if($item->move($dest,$fname))
                        {
                            $data = Asset::where('a_code',$req->code)->get();
                            $id = $data[0]->id;
                            $img = new Assetimage();
                            $img->asset_id = $id;
                            $img->image = $fname;
                            $img->save();
                        }
                        else
                        {
                            $path=public_path()."uploads/".$fname;
                            unlink($path);
                            return back()->with('errMsg','Image Not Added');
                        }
                    }
                }
                return back()->with('success','Asset Added');
            }
            else
            {
                return back()->with('errMsg','Asset Not Added');
            }
        }
    }

    //delete assets
    public function deleteAsset($id){
        $catdata=Asset::where('id',$id)->first();
        $cat=Asset::find($id);
        $img = Assetimage::where('asset_id',$id)->get();
        foreach($img as $i)
        {
            $fname = $i['image'];
            $path=public_path()."/uploads/".$fname;
            //unlink($path);
        }
        Assetimage::where('asset_id',$id)->delete();
        if($cat->delete())
        {
            //unlink($imagePath);
            return back()->with('success','Asset deleted');
        }
        else{
          return "Asset type not deleted";
        }
    }

    //edit asset view
    public function editAsset($id)
    {
        $catdata=Asset::where('id',$id)->first();
        $data = Assettype::all();
        return view('editasset',['catdata'=>$catdata],['data'=>$data]);
    }

    //update asset
    public function updateAsset(Request $req)
    {
        Asset::where('id',$req->id)->update([
        'a_name'=>$req->a_name,
        'a_code'=>$req->code,
        'assettype_id'=>$req->type,
        'is_active'=>$req->radio,
        ]);
        $images = $req->file('images');
        if(!empty($images))
        {
            Assetimage::where('asset_id',$req->id)->delete();
            $dest=public_path('/uploads');
            foreach($images as $item)
            {
                $fname="Image-".rand()."-".time().".".$item->extension();
                if($item->move($dest,$fname))
                {
                    $img = new Assetimage();
                    $img->asset_id = $req->id;
                    $img->image = $fname;
                    $img->save();
                }
                else
                {
                    $path=public_path()."uploads/".$fname;
                    unlink($path);
                    return back()->with('errMsg','Image Not Added');
                }
            }
        }
        return redirect('/home/showAsset');
    }

    //display asset 
    public function showAsset()
    {
        $catdata=Asset::all();
        $assetimages = Assetimage::all();
        return view('asset',['catdata'=>$catdata],['assetimages'=>$assetimages]);
    }

    //list assets
    public function listAsset()
    {
        $catdata=Asset::paginate(3);
        return view('assetlist',['catdata'=>$catdata]);
    }

    //display asset images
    public function displayAssetImages($id)
    {
        $catdata=$id;
        $assetimages = Assetimage::all();
        return view('assetimages',['catdata'=>$catdata],['assetimages'=>$assetimages]);
    }

}

