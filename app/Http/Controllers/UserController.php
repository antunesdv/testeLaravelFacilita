<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                            
        return view("cadastroUsers");
    }

    public function cadastroUser(){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                    
        $results = DB::select("SELECT * FROM `cliente` ORDER BY `cliente`.`id` DESC LIMIT 30");               
        return view("consultaUsers",compact('results'));
    }

    public function consultaAll(){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                    
        $results = DB::select("SELECT * FROM `users` ORDER BY `id` DESC LIMIT 30");               
        return view("consultaUsers",compact('results'));
    }

    public function consultaId(Request $request, $id){
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }

        $results = DB::select("SELECT * FROM `users` WHERE ID = $id");
        $rs = DB::select("SELECT * FROM `livros` WHERE users_id = $id");        
        $total = count((array)$rs);                        
            if($total > 1){
                $total = $total - 1;        
                for ($i = 0; $i <= $total; $i++) {
                    $dataDevolucao = $rs[$i]->dataDevolucao;
                    $rs[$i]->dataDevolucao = date('d/m/Y',  strtotime($dataDevolucao));
                }
            }elseif($total == 1){                
                $dataDevolucao = $rs[0]->dataDevolucao;
                $rs[0]->dataDevolucao = date('d/m/Y',  strtotime($dataDevolucao));
            }else{
                return view("consultaUsersAll",compact('results','rs'));
            }        
        return view("consultaUsersAll",compact('results','rs'));
    }

    public function cadastro(){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $hoje = date("Y-m-d H:i:s"); 
        $senha = md5($nome);
        //checa se o cliente já não está cadastrado
        $results = DB::select("SELECT * FROM `users` WHERE email = '$email'");
        if (!empty($results))
            //return redirect()->intended('/error');
            return redirect()->back()->with('error', 'E-mail já cadastado');
        $results = DB::select("INSERT INTO `users`(`id`, `name`, `email`, `password`,`id_livro`,`statusAlocao`) VALUES(null,'$nome','$email','$senha',0,'Inativo')");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Usuário cadastrado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao cadastrar o Usuário');
        }
    }

    public function atualizar(Request $request, $id){        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        
        $results = DB::select("UPDATE `users` SET `name`='$nome',`email`='$email' WHERE id = $id");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Usuário atualizado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao atualizar o Usuário');
        }

    }

    public function deletar(Request $request, $id){        
        
        $results = DB::select("DELETE FROM `livros` WHERE `users_id` = $id");
        $results = DB::select("DELETE FROM `users` WHERE `id` = $id");
        if (empty($results)) {
            return redirect()->intended('/consultaUsers')->with('success', 'Usuário deletado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao deletar o Usuário');
        }
    }

    public function filtrar(){   
        $filtro = $_POST['txtfiltro'];        
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                    
        $results = DB::select("SELECT * FROM `users` WHERE name LIKE '%$filtro%' or email LIKE '%$filtro%' LIMIT 30");        
        // $total = count((array)$results);        
        // $total = $total - 1;
        // if($total > 1){
        //     for ($i = 0; $i <= $total; $i++) {                
        //         $id = $results[$i]->id;
        //         $r = DB::select("SELECT * FROM `livros` WHERE users_id = $id AND status = 'Alocado' ORDER BY dataPagamento01 DESC");                                          
        //         if(isset($r[0])){
        //             $results[$i]->nome_livro = $r[0]->name;        
        //         }                     
        //     } 
        // }       
        return view("consultaUsers",compact('results'));
    }
}
