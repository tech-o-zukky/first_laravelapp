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

        // 5-4 start
        $items = DB::select('select * from people');
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
}
