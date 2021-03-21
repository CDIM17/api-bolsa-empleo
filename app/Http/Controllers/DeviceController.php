<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    function add(Request $req)
    {
        $device = new Device();
        $device->name=$req->name;
        $device->member_id=$req->member_id;
        $result = $device->save();

        if($result)
        {
            return ["result" => "Data have been saved"];            
        }
        else
        {
            return ["result" => "Data Failed"];
        }  
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();

        if($result)
        {
            return ["result"=>"record has been deleted ".$id];
        }
        else
        {
            return ["result"=>"Delete Operation have failed"];
        }
        
    }

    function search($name)
    {
        return Device::where("name","like","%".$name."%")->get();
    }

    function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id=$req->member_id;
        $result = $device->save();

        if($result)
        {
            return ["result"=>"data have been updated"];
        }
        else
        {
            return ["result"=>"Operation Failed"];
        }

        return ["result"=>"Data is Updated"];
    }

    //
    function list($id=null)
    {
        return $id?Device::find($id) : Device::all();
    }

    function listAll()
    {
        return Device::all();
    }

    function listParams($id)
    {
        return Device::find($id);
    }

    function testData(Request $req)
    {
        $rules = array(
            "member_id" => "required|min:2|max:4"         
        );
        $validator = Validator::make($req->all(),$rules);
        
        if($validator->fails())
        {
               return response()->json($validator->errors(),400);
        }
        else
        {
            return ["x"=>"y"]; 
        }
        
        
    }
}
