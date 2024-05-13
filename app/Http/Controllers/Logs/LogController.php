<?php

namespace App\Http\Controllers\Logs;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index(){
        return Log::all();
    }

    public function show($id){
        return Log::findOrFail($id);
    }
}
