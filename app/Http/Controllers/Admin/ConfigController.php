<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index(Request $request) {
        $name = 'Luan Farias';
        $age = 16;
        $city = $request->input('city');

        // $cakeList = ['floor', 'egg', 'milk', 'butter'];
        $cakeList = [];

        $data = [
            'name' => $name,
            'age' => $age,
            'city' => $city,
            'cakeList' => $cakeList
        ];

        return view('admin.config', $data);
    }

    public function info()
    {
        echo "Config Info";
    }

    public function permissoes()
    {
        echo "Config Permissoes";
    }

}
