<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LivrosController extends Controller
{
    public function index(){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                            
        return view("cadastroLivros");
    }

    public function consultaAll(){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                    
        $results = DB::select("SELECT * FROM `livros` ORDER BY `id` DESC LIMIT 30");               
        return view("consultaLivros",compact('results'));
    }

    public function AlocarLivroEscolha(Request $request, $id){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }
        $results = DB::select("SELECT * FROM `livros` ORDER BY `id` DESC LIMIT 30");               
        return view("alocarLivros",compact('results','id'));
    }

    public function AlocarLivro(Request $request, $id, $id_livro){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }        
        $hoje = date("Y-m-d");
        $hoje2 = date("Y-m-d");
        $devolucao = date('Y/m/d', strtotime($hoje2.' + 1 months'));
        $results = DB::select("UPDATE `livros` SET `status`='Emprestado',`dataRetirada`='$hoje',`dataDevolucao`='$devolucao',`users_id`='$id' WHERE id = $id_livro");
        $results = DB::select("UPDATE `users` SET `statusAlocao`='Ativo',`id_livro`='$id_livro' WHERE id = $id");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Livro alocado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao alocar o Livro');
        }        
    }

    public function DevolucaoLivro(Request $request, $id, $id_livro){    
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }        
        $results = DB::select("UPDATE `livros` SET `status`='Disponível',`dataRetirada`=null,`dataDevolucao`=null,`users_id`=null,`atrasado`=null WHERE id = $id_livro");
        $results = DB::select("UPDATE `users` SET `statusAlocao`='Inativo',`id_livro`='$id_livro' WHERE id = $id");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Livro devolvido com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao devolver o Livro');
        }        
    }

    public function consultaId(Request $request, $id){
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }
        $results = DB::select("SELECT * FROM `livros` WHERE ID = $id");         
        $dataDevolucao = $results[0]->dataDevolucao;
        $results[0]->dataDevolucao = date('d/m/Y',  strtotime($dataDevolucao));
        $dataRetirada = $results[0]->dataRetirada;
        $results[0]->dataRetirada = date('d/m/Y',  strtotime($dataRetirada));
        return view("consultaLivrosAll",compact('results'));
    }

    public function cadastro(){
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];        
        $registro = $_POST['registro'];
        $genero = $_POST['genero'];

        //checa se o livro já não está cadastrado
        $results = DB::select("SELECT * FROM `livros` WHERE nome = '$nome'");
        if (!empty($results))
            //return redirect()->intended('/error');
            return redirect()->back()->with('error', 'Nome já cadastado');
        $results = DB::select("INSERT INTO `livros`(`id`, `nome`, `autor`, `registro`, `status`, `genero`, `atrasado`) VALUES (null,'$nome','$autor','$registro','Disponível','$genero','não')");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Livro cadastrado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao cadastrar o Livro');
        }
    }

    public function atualizar(Request $request, $id){        
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];        
        $registro = $_POST['registro'];
        $genero = $_POST['genero'];
        $status = $_POST['status'];
        $dataRetirada = $_POST['dataRetirada'];
        $dataDevolucao = $_POST['dataDevolucao'];        
        $atrasado = $_POST['atrasado'];  
        
        $results = DB::select("UPDATE `livros` SET `nome`='$nome',`autor`='$autor',`registro`='$registro',`genero`='$genero',`status`='$status',`atrasado`='$atrasado',`dataRetirada`='$dataRetirada',`dataDevolucao`='$dataDevolucao' WHERE id = $id");        
        if (empty($results)) {
            return redirect()->back()->with('success', 'Livro atualizado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao atualizar o Livro');
        }

    }

    public function deletar(Request $request, $id){        
        $results = DB::select("SELECT * FROM `users` WHERE `id_livro` = $id"); 
        if (empty($results)) {
            $results = DB::select("DELETE FROM `livros` WHERE `id` = $id");        
            if (empty($results)) {
                return redirect()->intended('/consultaLivros')->with('success', 'Livro deletado com sucesso');
            } else {
                return redirect()->back()->with('error', 'Erro ao deletar o Livro');
            }
        }else {
            return redirect()->back()->with('error', 'Esse livro foi alocado por um usuário');
        }        
    }

    public function filtrar(){   
        $filtro = $_POST['txtfiltro'];        
        if(!session()->has('user')){
            return redirect()->intended('/login');
        }                    
        $results = DB::select("SELECT * FROM `livros` WHERE nome LIKE '%$filtro%' or autor LIKE '%$filtro%' or genero LIKE '%$filtro%' or registro LIKE '%$filtro%' LIMIT 30");
        return view("consultaLivros",compact('results'));
    }
}
