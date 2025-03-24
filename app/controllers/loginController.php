<?php

class Login extends Controller{

	private $auth, $sign;

	public function index_index(){

		$res = System::getUrl(1);
		$data['error'] = (System::getUrl(1) == "error" || System::getUrl(2) == "error") ? true : false;

		if($res == "cadastro")
			$this->view('cadastro', $data);
		else
			$this->view('login', $data);
	}

	public function entrar(){

		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !empty($_POST['email'])){

			$email = strip_tags(trim($_POST['email'])); //remove xss
			$senha = strip_tags(trim($_POST['senha']));
			$check = (isset($_POST['lembrar'])) ? trim($_POST['lembrar']) : null;
			$check = ($check == "ativado") ? true : false;

			$this->auth = new authHelper();
			$this->auth->setUser($email)
					   ->setPass($senha)
					   ->setCheck($check)
					   ->login();
		}
		else{
			$red = new redirectorHelper();
			$red->go('login/error/');
		}
	}

	public function cadastrar(){

		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !empty($_POST['email'])){

			$nome = strip_tags(trim($_POST["nome"]));
			$telefone = strip_tags(trim($_POST["telefone"]));
			$datanasc = strip_tags(trim($_POST["datanasc"]));
			$sexo = strip_tags(trim($_POST["sexo"]));
			$cpf = strip_tags(trim($_POST["cpf"]));
			$cidade = strip_tags(trim($_POST["cidade"]));
			$estado = strip_tags(trim($_POST["estado"]));
			$pais = strip_tags(trim($_POST["pais"]));
			$profissao = strip_tags(trim($_POST["profissao"]));
			$trabalho = strip_tags(trim($_POST["trabalho"]));
			$escolaridade = strip_tags(trim($_POST["escolaridade"]));
			$escola = strip_tags(trim($_POST["escola"]));
			$idiomas = strip_tags(trim($_POST["idiomas"]));
			$descricao = strip_tags(trim($_POST["descricao"]));
			$email = strip_tags(trim($_POST["email"]));
			$senha = strip_tags(trim($_POST["senha"]));

			$this->sign = new signHelper($nome, $telefone, $datanasc, $sexo, $cpf, $cidade, $estado, $pais, $profissao, $trabalho, $escolaridade, $escola, $idiomas, $descricao, $email, $senha);
			$ver = $this->sign->insertDatas();

			if($ver === true){
				$this->auth = new authHelper();
				$this->auth->setUser($email)
					   ->setPass($senha)
					   ->setCheck(true)
					   ->login();
			}

		}
		else{
			$red = new redirectorHelper();
			$red->go('cadastro/error/');
		}

	}

}