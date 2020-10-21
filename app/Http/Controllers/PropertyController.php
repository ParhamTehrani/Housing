<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use App\Repository\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    protected $property;
    protected $address;
    protected $user;
    public function __construct(Property $property,Address $address,User $user)
    {
        $this->property = new Repo($property);
        $this->address = new Repo($address);
        $this->user = new Repo($user);
    }
    public function index()
    {
        $properties=$this->property->all();
        return view('property.index',compact('properties'));
    }
    public function create()
    {
        $address=$this->address->all();
        $user=$this->user->all();
        return view('property.create',compact('address','user'));
    }
    public function store(Request $request)
    {
        $property=[
            'address_id'=>$request->address_id
        ];
        $propertyId=$this->property->create($property);

        $user=User::whereIn('id',$request->user_id)->get();
        $array=array();
        foreach ($user as $val)
        {
            $array[$val->id]=array([
                'user_id'=>$val->id,
                'property_id'=>$propertyId->id
            ]);
            $propertyId->user()->attach($array[$val->id]);
        }
        return redirect(url('/property'));
    }

    public function edit(Property $property)
    {
        $address=$this->address->all();
        $user=$this->user->all();
        $selectedAddress=$this->address->show($property->address_id);
        return view('property.edit',compact('property','address','user','selectedAddress'));
    }

    public function update(Request $request,Property $property)
    {
        DB::table('property_user')->where('property_id',$property->id)->delete();



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

        $data=$request->all();
        unset($data['user_id']);
        $this->property->update($data,$property->id);
        return redirect(url('/property'));
    }
    public function destroy(Property $property)
    {
        $property->delete();
        DB::table('property_user')->where('property_id',$property->id)->delete();
        return redirect(url('/property'));
    }
}
