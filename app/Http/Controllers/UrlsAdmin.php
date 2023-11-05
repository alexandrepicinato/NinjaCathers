<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encurtaurl;
use App\Models\Requestlog;

class UrlsAdmin extends Controller
{
    //
    public function __construct(Encurtaurl $Encurtaurl, Requestlog $Requestlog){
        $this->Encurtaurl = $Encurtaurl;
        $this ->Requestlog = $Requestlog;
    }
    public function NewURL(Request $Request){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 30; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       $projectlink="http://127.0.0.1:8000";
       $normallink=$Request ->urlmade;
       $enderecoip = $_SERVER["REMOTE_ADDR"];
       $data = date('d/m/y h:m:s');
        $this -> Encurtaurl ->create([
            'ninjaurl'=>$randomString,
            'debugurl'=>$normallink,
            'debugactive' =>1,
            'enderecoip'=>$enderecoip,
            'daterequest'=>$data,
            'navegador'=>$data,
            'updated_at'=>$data,
            'created_at'=>$data,
        ]);

        return view('linkslist',[
            'normal' => $normallink,
            'redirurl'=>$projectlink."/r/".$randomString,
            'debbugerurl'=>$projectlink."/d/".$randomString,
            'admurl'=>$projectlink."/a/".$randomString
        ]);
    }
    public function LogInfos($id){
        $debuguerlog = $this -> Requestlog-> where('idrequest',$id)->get();
        return view('logslist', [
            'linklog'=>$debuguerlog
        ]);
    }
}
