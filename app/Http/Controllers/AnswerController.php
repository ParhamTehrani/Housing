<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Answer;
use App\Models\Property;
use App\Models\User;
use App\Repository\Repo;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
        $property=$this->property->all();
        foreach ($property as $key=>$prop)
        {
            $address=$this->address->show($prop->address_id);
            $data[$key] = new Answer();
            $data[$key]->data=[
                'address'=>$address->house_name_number,
            ];
            $data[$key]->message='success message';
            $data[$key]->success=true;
            $res[$key]=[
                'data'=>$data[$key]->data,
                'message'=>$data[$key]->message,
                'success'=>$data[$key]->success
            ];
        }
        return $res;
    }
    public function show($id)
    {
        $property=$this->property->show($id);
        $address=$this->address->show($property->address_id);
        $data = new Answer();
        $data->data=[
            'address'=>$address->house_name_number,
        ];
        $data->message='success message';
        $data->success=true;
        return response()->json(['data'=>$data->data,'message'=>$data->message,'success'=>$data->success]);
    }
}
