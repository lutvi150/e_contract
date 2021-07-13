<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function serTes(Type $var = null)
    {
        $data="a:5:{i:0;i:1;i:1;i:2;i:2;i:4;i:3;i:5;i:4;i:6;}";
        $result=serialize($data);
        return response()->json(unserialize($data));
    }
}
