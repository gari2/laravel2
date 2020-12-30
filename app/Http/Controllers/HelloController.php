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
// use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\ErrorHandler\Debug;
use Throwable;

class HelloController extends Controller
{
    // use Dispatchable;
    public function __construct()
    {
    }

    public function index()
    {
        $msg = 'show people record.';
        $result = Person::get();
        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];
        return view('hello.index', $data);
    }
        
    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);
        logger()->info("a");
        logger()->info($person);
        dispatch_now(function() use ($person)
        {
            Storage::append('person_access_log.txt',$person);
        });
        // Storage::append('person_access_log.txt',
        // $person);
        // return redirect()->route('hello');
        var_dump(get_defined_vars());
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
