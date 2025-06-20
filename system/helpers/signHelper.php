<?php

require_once("hashHelper.php");

class signHelper{

	protected $db, $redirectorHelper;
	private $error, $name, $name_url, $email, $phone, $dateb, $pass, $salt, $hashcookie;

	public function __construct($nome, $telefone, $datanasc, $sexo, $cpf, $cidade, $estado, $pais, $profissao, $trabalho, $escolaridade, $escola, $idiomas, $descricao, $email, $senha){
		$this->name = $nome;
		$this->email = $email;
		$this->pass = $senha;
		$this->telefone = $telefone;
		$this->datanasc = $datanasc;
		$this->sexo = $sexo;
		$this->cpf = $cpf;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->pais = $pais;
		$this->profissao = $profissao;
		$this->trabalho = $trabalho;
		$this->escolaridade = $escolaridade;
		$this->escola = $escola;
		$this->idiomas = $idiomas;
		$this->descricao = $descricao;
		$this->name_url = $this->patternUrl($nome);
		$this->encryptPass();
		$this->error = $this->checkNameAndEmail();
		$this->redirectorHelper = new redirectorHelper();
	}

	private function encryptPass(){
		$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
		$salt = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
		$this->salt = utf8_encode($salt);
		$this->pass = pbkdf2('SHA256', $this->pass, $this->salt, 100, 32, false);
		$this->hashcookie = md5($this->salt.time("His"));
	}

	private function checkNameAndEmail(){
		$this->db = new loginModel();
		$res = $this->db->listaDados("id", "nome=? OR email=?", array("nome"=>$this->name, "email"=>$this->email));
		if(count($res) > 0)
			return true;
		return false;
	}

	private function patternUrl($str){
		$str = strtolower(utf8_decode($str)); 
		
		$str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
		$str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));

		$i=1;
		while($i>0) 
			$str = str_replace('--','-',$str,$i);

		if (substr($str, -1) == '-') 
			$str = substr($str, 0, -1);

		return $str;
	}

	public function insertDatas(){
		if($this->error === true){
			$this->redirectorHelper->go('login/cadastro/error/');
			return false;
		}
		else{
			$this->db->insereDados(array(
				"nome" => $this->name,
				"nome_url" => $this->name_url,
				"email" => $this->email,
				"data_nascimento" => $this->datanasc,
				"telefone" => $this->telefone,
				"foto" => "default.jpg",
				"fundo" => "bg1.png",
				"hash" => $this->pass,
				"hash_cookie" => $this->hashcookie,
				"salt" => $this->salt,
				"ip" => $_SERVER['REMOTE_ADDR'],
				"sexo" => $this->sexo,
				"cpf" => $this->cpf,
				"cidade_uf" => $this->cidade,
				"estado" => $this->estado,
				"pais" => $this->pais,
				"profissao" => $this->profissao,
				"trabalho" => $this->trabalho,
				"escolaridade" => $this->escolaridade,
				"escola" => $this->escola,
				"idiomas" => $this->idiomas,
				"descricao" => $this->descricao
			));
			return true;
		}
	}

	public function setNewAccount($email, $senha, $check, $id){
		$this->pass = $senha;
		$this->encryptPass();
		if($check){
			$cook = new cookieHelper();
			$cook->setCookie('XH2CuociRS', $this->hashcookie);
		}

		$ip = $_SERVER['REMOTE_ADDR'];
		$this->db->editaDados(array(
			"email",
			"hash",
			"hash_cookie",
			"salt",
			"ip"
		), 
		"id=?", 
		array(
			"email" => $email,
			"hash" => $this->pass,
			"hash_cookie" => $this->hashcookie,
			"salt" => $this->salt,
			"ip" => $ip,
			"id" => $id
		));
	}

}