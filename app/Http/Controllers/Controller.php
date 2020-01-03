<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function teste(){
        $users = DB::select('select * from players');
        echo '<pre>'; print_r($users); echo '</pre>';
       exit;
    }
    
    public function playerCard(){
        $data['players'] = DB::select('select nome,id from players where ativo ="T"');
        
        //print_r($data);exit;
        return view('card', $data);
        /*//$users =  DB::table('players')->where('ativo', 'T');
       
       // echo '<pre>'; print_r($users); echo '</pre>';
       exit;*/
    }

    
    public function ajax_player_profile(){
        $player_id = $_GET['player_id'];
        $user = DB::select('select * from players where id ='.$player_id);
        echo json_encode($user,JSON_UNESCAPED_UNICODE);
    }

    
    public function ajax_get_players(){
        $users = DB::select('select id,nome,img from players where ativo = "T"');
        echo json_encode($users,JSON_UNESCAPED_UNICODE);
    }


}
