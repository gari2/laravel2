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
use App\Jobs\Myjob;

class HelloController extends Controller
{
    public function __construct()
    {
    }

    public function index(Person $person = null)
    {
        if($person != null)
        {
            Myjob::dispatch($person);
        }
        $msg = 'show people record.';
        $result = Person::get();

        $data = [
            'input'=>'',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }

    public function send(Request $request)
    {
        $input = $request->input('find');
        $msg = 'search: ' . $input;
        Person::get(['*'])->searchable();
        $result = Person::search($input)->get();

        $data = [
            'input' => $input,
            'msg' => $msg,
            'data'=> $result,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234];
        $person->save();
        return redirect()->route('hello');
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route(('hello'));
    }

    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Person::get()->toJson();
        }
        else
        {
            return Person::find($id)->toJson();
        }
    }
    
}
