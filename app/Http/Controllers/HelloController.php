<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index() {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.index', ['data'=>$data]);     //3-22
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
