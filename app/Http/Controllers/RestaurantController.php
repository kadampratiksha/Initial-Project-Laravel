<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantImage;
use DataTables;

class RestaurantController extends Controller
{
    public function getAllRestaurant(){
        return view('restaurant/all');
    }

    public function getAllRestaurantData(){
        $restaurant = Restaurant::with('resto_img')->get();

        return DataTables::of($restaurant)->make(true);
    }

    public function postAddRestaurant(Request $request){
        $restaurant = new Restaurant();
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->restaurant_code = $request->restaurant_code;
        $restaurant->restaurant_desc = $request->restaurant_desc;
        $restaurant->phone_no = $request->phone_no;
        $restaurant->email = $request->email;
        $restaurant->save();
  
        $restaurant_image = new RestaurantImage();
        $restaurant_image->restaurant_id = $restaurant->restaurant_id;
        if($request->hasFile('restaurant_image')){
            $image = $request->restaurant_image;
            $file_path = $image->store('restaurant_image');
            $restaurant_image->restaurant_image = $file_path;
        }
        $restaurant_image->save();

        return redirect()->back();
    }

    public function postEditRestaurant(Request $request){

        $restaurant = Restaurant::find($request->resto);
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->restaurant_code = $request->restaurant_code;
        $restaurant->restaurant_desc = $request->restaurant_desc;
        $restaurant->phone_no = $request->phone_no;
        $restaurant->email = $request->email;
        $restaurant->save();
  
        $restaurant_image = RestaurantImage::where('restaurant_id', $request->resto)->first();
        
        if($request->hasFile('restaurant_image')){
            $image = $request->restaurant_image;
            $file_path = $image->store('restaurant_image');
            $restaurant_image->restaurant_image = $file_path;
        }
        $restaurant_image->save();

        return redirect()->back();
    }

    public function deleteRestaurant(Request $request){
        $restaurant = Restaurant::find($request->restaurant_id);
        $restaurant->delete();
        return redirect()->back();
    }
}
