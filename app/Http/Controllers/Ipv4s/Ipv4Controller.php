<?php

namespace App\Http\Controllers\Ipv4s;

use Illuminate\Http\Request;
use App\Models\Ipv4;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ipv4\Ipv4CreateRequest;
use App\Http\Requests\Ipv4\Ipv4UpdateRequest;

class Ipv4Controller extends Controller
{
    public function index(){
        return Ipv4::all();
    }

    public function store(Ipv4CreateRequest $request){
        $record = Ipv4::create($request->only('ipv4', 'comment'));
        return response()->json($record, 201);
    }

    public function show($id){
        return Ipv4::findOrFail($id);
    }

    public function update(Ipv4UpdateRequest $request, $id){
        $record = Ipv4::findOrFail($id);
        $record->update($request->only('comment'));
        return response()->json($record, 200);
    }
}
