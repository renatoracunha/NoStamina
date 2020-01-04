<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request ;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function teste(){
        $users = DB::select('select * from players');
        echo '<pre>'; print_r($users); echo '</pre>';
       exit;
    }
    
    public function playerCard(Request $request){
        $data['players'] = DB::select('select nome,id from players where ativo ="T"');
        if(!empty($request))
        {
            $data['player_id']= $request->player_id ;
           // print_r($data);exit;
        }
        else
        {
            $data['player_id']=0;
        }
        
        
        return view('card', $data);
       
    }

    
    public function ajax_player_profile(){
        $player_id = $_GET['player_id'];
        $user = DB::select('select players.id, players.nome,players.mvp,players.assistencias,players.mensal,players.img,players.partidas,players.gols,
                                    (select (AVG(speed)+AVG(stamina)+AVG(defence)+AVG(pass)+AVG(shooting))/5 from players_ratings where player_votado = '.$player_id.') as media_votos 
                                from players where id ='.$player_id);
        echo json_encode($user,JSON_UNESCAPED_UNICODE);
    }

    
    public function ajax_get_players(){
        $users = DB::select('  select 
                                        players.id,
                                        players.nome,
                                        players.img,
                                        ( SELECT (shooting+speed+pass+defence+stamina)/5 from players_ratings where players_ratings.player_votado = players.id and player_votador = 1 ) as has_been_rated 
                                from players where ativo = "T"
                            ');//torcar o id = 1 pela session quando tiver login
        echo json_encode($users,JSON_UNESCAPED_UNICODE);
    }


    
    public function ajax_rate_player(){
        $shooting = $_GET['rating'];
        $speed = $_GET['rating'];
        $pass = $_GET['rating'];
        $defence = $_GET['rating'];
        $stamina = $_GET['rating'];
        $voting_player = $_GET['voting_player'];
        $voted_player = $_GET['voted_player'];
        DB::insert('insert into players_ratings (player_votador, player_votado, shooting, pass, defence, stamina, speed) 
                                                values (?, ?,?,?,?,?,?)', [$voting_player, $voted_player ,$shooting,$pass,$defence,$stamina,$speed]);
        echo json_encode($voted_player,JSON_UNESCAPED_UNICODE);
    }
    
    public function ajax_register_player(){
        $nome = $_GET['nome'];
        $senha = $_GET['senha'];
        $img = $_GET['imagem'];
        $login = $_GET['nome'];

        $id =DB::table('players')->insertGetId(
            ['nome' => $nome, 'senha' => $senha, 'img' => $img, 'login' => $login]
        );
        /*DB::insert('insert into players (nome, senha, img, login) 
                                                values (?, ?,?,?)', [$nome, $senha ,$img,$login]);*/
        echo json_encode($id,JSON_UNESCAPED_UNICODE);
    }

    public function upload_imagem(Request $request){
        $file_name = $request->player_id.'.'.$request->imagem_player->extension();
       // print_r();exit;
        $request->imagem_player->storeAs('profile_pictures',$file_name);
        DB::table('players')
            ->where('id', $request->player_id)
            ->update(['img' => $file_name]);
        return redirect('card/'.$request->player_id);
       
	}



}
