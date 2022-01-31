<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BusinessPhotoController extends Controller
{

    public function create(Request $request)
    {
        return view('dashboard.is_manager.add_business_photo', [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'business_id' => $request->business_id
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'photo' => 'required|file|image|mimes:png,jpg,jpeg',
            'description' => 'required'
        ]);
       
        $businessname = Business::find($request->business_id);

        $img = $request->file('photo');
        $img_file = Controller::ImageStr(8). '.' .$request->photo->extension();

        //make directory images
        //check if folder with business name already exists else create... folder
        //create folder with business name under images directory
        //move the uploaded image to folder of its business name

        if(!File::exists('images')){
            File::makeDirectory('images', 0755, true, true);
        }

        $createBusinessPhoto = BusinessPhoto::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'business_id' => $request->business_id,
            'photos' => $img_file,
            'description' => $request->description
        ]);

        if ($createBusinessPhoto) {

            $folderName = $businessname->business_name;
            $imagePath = 'images/'. $folderName;
            File::makeDirectory($imagePath, 0755, true, true);
            $img->move($imagePath, $img_file);

            return redirect(route('dashboard.show-business', $businessname->business_name));
        }
    }

    public function removePhoto(BusinessPhoto $businessPhoto)
    {
        $businessname = Business::find($businessPhoto->business_id);

        $businessPhoto->delete();

        if(File::exists(public_path('images/'.$businessname->business_name.'/'.$businessPhoto->photos))){
            File::delete(public_path('images/'.$businessname->business_name.'/'.$businessPhoto->photos));
        }
        return back();
    }
}
