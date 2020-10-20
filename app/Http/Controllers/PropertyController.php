<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties=Property::all();
        return view('property.index',compact('properties'));
    }
    public function create()
    {
        $address=Address::all();
        $user=User::all();
        return view('property.create',compact('address','user'));
    }
    public function store(Request $request)
    {

        $property=Property::create([
            'address_id'=>$request->address_id
        ]);

        $user=User::whereIn('id',$request->user_id)->get();
        $array=array();
        foreach ($user as $val)
        {
            $array[$val->id]=array([
                'user_id'=>$val->id,
                'property_id'=>$property->id
            ]);
            $property->user()->attach($array[$val->id]);
        }
        return redirect(url('/property'));
    }
}
