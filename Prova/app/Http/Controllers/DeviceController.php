<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    //
    function list($id = null)

    {

        return $id ? Device::find($id) : Device::all();
    }

    function add(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255', // Valida que 'name' sea una cadena no nula de hasta 255 caracteres.
            'member_id' => 'required|integer',    // Valida que 'member_id' sea un número entero no nulo.
        ]);

        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been saved"];
        } else {
            return ["Result" => "Data has not been saved, an error ocurred"];
        }
    }

    function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["result" => "Data has been updated"];
        } else {
            return ["result" => "Data has not been updated, there is and error"];
        }
    }

    function search($name)
    {
        $answer = Device::where("name", "like", "%" . $name . "%")->get();
        if ($answer->isEmpty()) {
            return ["result" => "We could not find what you are inputing"];
        } else {
            return $answer;
        }
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["result" => "Record have been deleted " . $id];
        } else {
            return ["result" => "Delete operation have failed"];
        }
    }

    function testData(Request $req)
    {
        $rules = array(
            "member_id" => "required|min:2|max:4"
        );
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = new Device;
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();
            if ($result) {
                return ["Result" => "Data has been saved"];
            } else {
                return ["Result" => "Data has not been saved, an error ocurred"];
            }
        }
    }
}
