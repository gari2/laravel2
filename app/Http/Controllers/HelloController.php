<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
// use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;

class HelloController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $msg = 'show people record.';
        $result = Person::get()->filter(function ($person) {
            return $person->age < 50;
        });
        $result2 = Person::get()->filter(function($person)
        {
            return $person->age < 20;
        });
        $result3 = $result->diff($result2);

        $data = [
            'msg' => $msg,
            'data' => $result2,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@yamada',
            'tel' => '090-999-999',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect()->route('hello', $data);
    }
}
