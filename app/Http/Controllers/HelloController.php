<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// start list2-11
global $head, $style, $body, $end;

$head = '<html><head>';

$style = <<<EOF
<style>
    body {font-size: 16pt; color: #999; }
    h1 {font-size: 100pt; text-align: right; color: #eee; 
        margin: -40px 0px -50px 0px; }
</style>
EOF;

$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<{$tag}>".$txt."</{$tag}>";
}
// end list2-11

class HelloController extends Controller
{
    public function index(Request $request) {
        // 5-7
        if (isset($request->id)) {
            $param = ['id' => $request -> id];
            $items = DB::select('select * from people where id = :id', $param);
        } else {
            $items = DB::select('select * from people');
        }

        // 5-4 start
        // $items = DB::select('select * from people');
        return view('hello.index',['items' => $items]);

        // // delete
        // $data = ['one', 'two', 'three', 'four', 'five'];
        // $data_eachtest = [
        //                     ['name' => '山田たろう', 'mail' => 'taro@yamada'],
        //                     ['name' => '田中はなこ', 'mail' => 'hanako@tanaka'],
        //                     ['name' => '佐藤さぶろう', 'mail' => 'saburo@sato']
        //                 ];

        // return view('hello.index', ['data'=>$data, 'data_eachtest'=> $data_eachtest, 'message'=>'Hello!']);     //3-22, 3-33
        // 5-4 end
    }

    // 3-15
    public function post(Request $request) {
        return view('hello.index', ['msg'=>$request->msg]);
    }

    public function other() {
        global $head, $style, $body, $end;

        $html = $head.tag('title', 'Hello/Order').$style.$body
                .tag('h1','Order').tag('p', 'this is Other page')
                .$end;

        return $html;
    }

    // 5-9 DBinsert
    public function add(Request $request) {
        return view('hello.add');
    }

    // 5-9 DBinsert
    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values 
                    (:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    // 5-12 DBupdate
    public function edit(Request $request) {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    // 5-12 DBupdate
    public function update(Request $request) {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name =:name, mail =:mail, age =:age) where id =:id', $param);
        return redirect('/hello');
    }
}
