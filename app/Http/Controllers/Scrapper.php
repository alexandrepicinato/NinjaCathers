<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encurtaurl;
use Goutte\Client;

class Scrapper extends Controller
{
    //
    public function __construct(Encurtaurl $Encurtaurl){
        $this->Encurtaurl = $Encurtaurl;
    }
    public function RedrawPage($iddebug){
        $urlgeral=$this->Encurtaurl->where('ninjaurl',$iddebug)->get();
        $url =$urlgeral[0]["debugurl"];
        $projetourl="http://127.0.0.1:8000";
        //$debugurl=$projetourl."debug/".$iddebug."/url/?url=".$url;
        $debugurl=$projetourl."/url.php?id=".$iddebug."&url=".$url;
        $domain = "https://".explode("/",$url)[2];
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $getpage =$crawler->html();
        $urlchanges= str_replace('src="/','src="'.$domain."/",$getpage);
        $urlchanges= str_replace('src="./','src="'.$url,$urlchanges);
        $urlchanges= str_replace('action="','action="'.$debugurl,$urlchanges);
        $urlchanges= str_replace('action="/','action="'.$debugurl,$urlchanges);

        return $urlchanges ;
    }
    public function OnlyRedirect($iddebug){
        $urlgeral=$this->Encurtaurl->where('ninjaurl',$iddebug)->get();
        $url =$urlgeral[0]["debugurl"];
        return redirect($url);
    }
    public function DebugRequest($iddebug, Request $Request){
        return var_dump($Request);
    }

}
