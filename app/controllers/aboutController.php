<?php

class About extends Controller{

	public function index_index(){

		$ses = new sessionHelper();
		$idGlobal = $ses->getSession('loginId');
		$idAtual = $ses->getSession('loginId');
		$modes = array('editmode', 'confirmmode');
		$var = (System::getUrl(1) != null and !in_array(System::getUrl(1), $modes)) ? System::getUrl(1) : $idAtual;
		$col = ($var == $idAtual) ? "id" : "nome_url";

		$about = new aboutModel();

		if($var != $idAtual){
			$about->_tabela = "usuarios";
			$res0 = $about->listaDados("id", "nome_url=?", array("nome_url"=>$var));
			if(count($res0) > 0)
				$idres = $res0[0]['id'];
			else
				$idres = $idAtual;
			$exibeadd = true;
		}
		else{
			$idres = $idAtual; 
			$exibeadd = false;
		}

		$exibeacc = 0;

		if($exibeadd){
			$about->_tabela = "amizades";
			$res00 = $about->listaDados("id_usuario, id_amigo, status", "((id_amigo=? AND id_usuario=?) OR (id_amigo=? AND id_usuario=?)) AND status<=?", array("id_amigo"=>$idres, "id_usuario"=>$idAtual, "id_amigo2"=>$idAtual, "id_usuario2"=>$idres, "status"=>1));
			
			if(count($res00) > 0){
				$exibeadd = false;
				$res000 = $about->listaDados("status, id_usuario", "((id_usuario=? AND id_amigo=?) OR (id_usuario=? AND id_amigo=?)) AND status=?", array("id_usuario"=>$idAtual, "id_amigo"=>$idres, "id_usuario2"=>$idres, "id_amigo2"=>$idAtual, "status"=>0));
				if(count($res000) > 0)
					$exibeacc = ($res000[0]['status'] == 0 && $res000[0]['id_usuario']==$idAtual) ? 2 : 1;
			}
			else
				$exibeadd = true;
			
		}

		$about->_tabela = "publicacoes";
		$res2 = $about->listaDados("id_usuario, id_amigo", "id_usuario=? AND status=?", array("id_usuario"=>$idAtual, "status"=>0));
		$about->_tabela = "usuarios";
		$res2 = $about->organizaDados($res2, array("nome_usuario", "nome_usuario_url", "foto_usuario"), $idAtual);

		$about->_tabela = "amizades";
		$res3 = $about->listaDados("id_usuario, id_amigo", "id_usuario=? AND status=?", array("id_usuario"=>$idAtual, "status"=>0));
		$about->_tabela = "usuarios";
		$res3 = $about->organizaDados($res3, array("nome_usuario", "nome_usuario_url", "foto_usuario"), $idAtual);
		
		$about->_tabela = "publicacoes";
		$res4 = $about->listaDados("id_usuario, data, conteudo, id_amigo", "id_amigo=? AND status<=?", array("id_amigo"=>$idres, "status"=>1), "id DESC", 2);
		$about->_tabela = "usuarios";
		$res4 = $about->organizaDados($res4, array("nome_amigo", "nome_usuario_url", "foto_usuario"), $idres, true); 

		$about->_tabela = "mensagens";
		$res5 = $about->listaDados("id_usuario, id_amigo, conteudo, status", "id_amigo=?", array("id_amigo"=>$idres), "id DESC", null, array("nome_usuario", "foto_usuario"));
		$about->_tabela = "usuarios";
		$res5 = $about->organizaDados($res5, array("nome_usuario", "nome_usuario_url", "foto_usuario"), $idres);

		$res6 = $about->listaDados("id, nome, nome_url, foto, cidade_uf", "id>?", array("id"=>0), "nome");
		
		$res = $about->listaDados("id, nome, nome_url, email, data_nascimento, telefone, cidade_uf, foto, fundo, sexo, cpf, estado, pais, profissao, trabalho, escolaridade, escola, locais, idiomas, musicas, filmes, livros, descricao", "$col=?", array($col=>$var));

		$about->_tabela = "amizades";
		$res7 = $about->listaDados("id_usuario, id_amigo", "(id_amigo=? OR id_usuario=?) AND status=?", array("id_amigo"=>$idGlobal, "id_usuario"=>$idGlobal, "status"=>1));

		if(count($res) > 0){

			$data['sobre'] = $res[0];
			$data['publicacoes'] = $res2;
			$data['requisicoes'] = $res3;
			$data['idres'] = $idres;
			$data['publicacoes_ult'] = $res4;
			$data['mensagens'] = $res5;
			$data['add'] = $exibeadd;
			$data['acc'] = $exibeacc;
			$data['pesquisar'] = $res6;
			$data['amigosok'] = $res7;

			$this->view('about', $data);
		}
		else{

			$about->_tabela = "usuarios";
			$res = $about->listaDados("nome, foto, nome_url, id", "id=?", array("id"=>$idres));

			$data['sobre'] = $res[0];
			$data['publicacoes'] = $res2;
			$data['requisicoes'] = $res3;
			$data['mensagens'] = $res5;
			$data['add'] = false;
			$data['acc'] = false;
			$data['pesquisar'] = $res6;

			$this->view('error404', $data);
		}

	}


	public function editar(){
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !empty($_POST['nome'])){

			$ses = new sessionHelper();
			$idAtual = $ses->getSession('loginId');

			$nome = strip_tags(trim($_POST['nome']));
			$datanasc = strip_tags(trim($_POST['datanasc']));
			$telefone = strip_tags(trim($_POST['telefone']));
			$sexo = strip_tags(trim($_POST["sexo"]));
			$cpf = strip_tags(trim($_POST["cpf"]));
			$cidade = strip_tags(trim($_POST["cidade"]));
			$estado = strip_tags(trim($_POST["estado"]));
			$pais = strip_tags(trim($_POST["pais"]));
			$locais = strip_tags(trim($_POST["locais"]));
			$profissao = strip_tags(trim($_POST["profissao"]));
			$trabalho = strip_tags(trim($_POST["trabalho"]));
			$escolaridade = strip_tags(trim($_POST["escolaridade"]));
			$escola = strip_tags(trim($_POST["escola"]));
			$idiomas = strip_tags(trim($_POST["idiomas"]));
			$filmes = strip_tags(trim($_POST["filmes"]));
			$musicas = strip_tags(trim($_POST["musicas"]));
			$livros = strip_tags(trim($_POST["livros"]));
			$descricao = $_POST["descricao"];

			$aboutedit = new aboutModel();
			$nome_url = $aboutedit->patternUrl($nome);

			$arr_campos = array("nome", "nome_url", "data_nascimento", "telefone", "cidade_uf", "sexo", "cpf", "estado", "pais", "profissao", "trabalho", "escolaridade", "escola", "locais", "idiomas", "musicas", "filmes", "livros", "descricao");
			$arr_values = array(
				"nome"=>$nome, 
				"nome_url"=>$nome_url, 
				"data_nascimento"=>$datanasc, 
				"telefone"=>$telefone, 
				"cidade_uf"=>$cidade,
				"sexo"=>$sexo,
				"cpf"=>$cpf,
				"estado"=>$estado,
				"pais"=>$pais,
				"profissao"=>$profissao,
				"trabalho"=>$trabalho,
				"escolaridade"=>$escolaridade,
				"escola"=>$escola,
				"locais"=>$locais,
				"idiomas"=>$idiomas,
				"musicas"=>$musicas,
				"filmes"=>$filmes,
				"livros"=>$livros,
				"descricao"=>$descricao, 
				"id"=>$idAtual
			);

			$aboutedit->editaDados($arr_campos, "id=?", $arr_values);

			$red = new redirectorHelper();
			$red->go('about/confirmmode');

		}
		else{
			$red->go('');
		}
	}

}