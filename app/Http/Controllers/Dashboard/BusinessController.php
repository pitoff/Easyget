<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BusinessResource;
use App\Models\Business;
use App\Models\BusinessPhoto;
use App\Models\Category;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(request()->expectsJson()){
            return BusinessResource::collection(Business::paginate());
        }
    }

    public function createBusiness()
    {
        return view('dashboard.is_manager.create_business', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
       $this->validateBusiness();

        Business::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->business_cat,
            'business_name' => $request->business_name,
            'description' => $request->description,
            'land_mark' => $request->land_mark,
            'address' => $request->address,
            'contact' => $request->contact,
        ]);
        return redirect(route('dashboard.home'))->with('Success', 'Business added successfully');
    }

    public function show(Business $business)
    {
        if(request()->expectsJson()){
            
            return new BusinessResource($business);

        }

        $user_id = auth()->user()->id;

        return view('dashboard.is_manager.show', [
            'business' => $business,
            'business_photo' => BusinessPhoto::where(['user_id' => $user_id, 'business_id' => $business->id])->get()
        ]);
    }

    public function getBusinessByCategory(Request $request)
    {
        $get_cat_name = Category::find($request->category);
        $where = [
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ];
        $getBusiness = Business::where($where)->paginate();
        
        return view('dashboard.is_manager.business_by_cat', [
            'business' => $get_cat_name,
            'businesses' => $getBusiness
        ]);
    }

    public function edit(Business $business)
    {
        return view('dashboard.is_manager.edit', [
            'categories' => Category::all(),
            'business' => $business
        ]);
    }

    public function update(Request $request, Business $business)
    {
        $this->validateBusiness();

        Business::where('id', $business->id)->update([
            'category_id' => $request->business_cat,
            'business_name' => $request->business_name,
            'description' => $request->description,
            'land_mark' => $request->land_mark,
            'address' => $request->address,
            'contact' => $request->contact
        ]);

        return redirect(route('dashboard.home'))->with('UpdateSuccess', 'Business has been updated');
    }

    public function delete($id)
    {
        $business = Business::find($id);
        if($business){
            return response()->json([
                'status' => 200,
                'business' => $business
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Student was not found on database'
            ]);
        }
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
        return response()->json([
            'status' => 200,
            'message' => 'You just deleted a business'
        ]);
    }

    public function validateBusiness()
    {
        return request()->validate([
            'business_cat' => 'required',
            'business_name' => 'required',
            'description' => 'required',
            'land_mark' => 'required',
            'address' => 'required',
            'contact' => 'required'
        ]);
    }
}
