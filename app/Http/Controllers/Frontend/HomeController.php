<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @deprecated
 */
class HomeController extends Controller
{
    private static array $content = [
        "css" => "Content-type: text/css",
        "js" => "Content-type: text/javascript",
    ];

    public function __construct()
    {
    }

    public function index()
    {
        return $this->render("home.homepage", ["teste" => true]);
    }

    public function login()
    {
        return $this->render("home.login");
    }

    public function public(Request $request)
    {
        $content = Storage::get($request->input("file"));

        if( is_null($content) ) {
            return "";
        }

        $ext = explode(".", $request->input("file"));
        $lastKey = count($ext)-1;

        if( isset(self::$content[$ext[$lastKey]]) ){
            header(self::$content[$ext[$lastKey]]);
        } else {
            header("Content-type: text/plain");
        }
        header("Content-Length: ".strlen($content));

        echo $content;
        return;
    }
}
