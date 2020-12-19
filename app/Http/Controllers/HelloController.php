<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use App\MyClasses\MyService;
use Illuminate\Support\Facades\Storage;


class HelloController extends Controller
{
    private $fname;
    public function __construct(MyService $myService)
    {
        $myservice = app('App\MyClasses\MyService');
    }

    public function index(Myservice $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say($id),
            'data' => $myservice->alldata(),
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
