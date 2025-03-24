<script type="text/javascript" src="scripts/jquery.superbgimage.min.js"></script>
<script type="text/javascript">
$(function() {
	$("html,body").superbgimage();
});
</script>


<div id="global-login" align="center">

	<div id="content" align="center">
		<div class="sub_content">


			<span class="title">Me cadastrar na Perspective</span>
			<br>
			<!-- 
			<div class="text bold">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. 
			</div> 
			-->
			<div class="text bold" style="font-size: 22px; text-shadow:0px 1px 1px rgba(0,0,0,0.5); font-family: 'GeoSansLight', Tahoma">
				Veja fotos, compartilhe posts, faça amizades, e troque mensagens. Conheça o mundo em uma nova perspectiva!
			</div>

			<br>
			<br>
			<br>

			<div class="window">
			<?php
			if($view_error)
				echo "<span class='error'>Erro: Dados Inválidos!</span><br><br>"
			?>
				<form name="form_cadastro" id="form_cadastro" action="<?php echo System::getBase(); ?>login/cadastrar/" method="post">
					<input type="text" name="nome" id="nome" class="input_text_b" placeholder="Nome Completo" size="45" autocomplete="off" />
					<div class="mh"></div>

					<input type="text" name="telefone" id="telefone" class="input_text_b" placeholder="Telefone" size="45" autocomplete="off" />
					<div class="mh"></div>

					<input type="text" name="datanasc" id="datanasc" class="input_text_b" placeholder="Data de Nascimento" size="45" autocomplete="off">
					<div class="mh"></div>

					<select name="sexo" id="sexo" class="input_text_b" placeholder="Sexo" style="width:100%">
					  <option selected="true" disabled="disabled">Selecione seu sexo</option>
					  <option value="Masculino">Masculino</option>
					  <option value="Feminino">Feminino</option>
					  <option value="Outro">Outro</option>
					</select>
					<div class="mh"></div>

					<input type="text" name="cpf" id="cpf" class="input_text_b" placeholder="CPF (opcional)" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="cidade" id="cidade" class="input_text_b" placeholder="Cidade" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="estado" id="estado" class="input_text_b" placeholder="Estado ou Distrito" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="pais" id="pais" class="input_text_b" placeholder="País" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="profissao" id="profissao" class="input_text_b" placeholder="Profissão" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="trabalho" id="trabalho" class="input_text_b" placeholder="Local de trabalho (opcional)" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="escolaridade" id="escolaridade" class="input_text_b" placeholder="Escolaridade" size="45" autocomplete="off">
					<div class="mh"></div>

					<input type="text" name="escola" id="escola" class="input_text_b" placeholder="Local de estudo (opcional)" size="45" autocomplete="off">
					<div class="mh"></div>

					
					<input type="text" name="idiomas" id="idiomas" class="input_text_b" placeholder="Idiomas" size="45" autocomplete="off">
					<div class="mh"></div>

					<textarea name="descricao" id="descricao" class="input_text_b" rows="4" placeholder="Descrição sobre você" style="font-family: Calibri, Arial; max-width: 220px; border-radius: 20px"></textarea>
					<div class="mh"></div> 

					<input type="email" name="email" id="email" class="input_text_b" placeholder="E-mail" size="45" autocomplete="off" />
					<div class="mh"></div>

					<input type="password" name="senha" id="senha" class="input_text_b" placeholder="Senha" size="45" autocomplete="new-password" />
					<div class="mh"></div>

					<input type="checkbox" name="lembrar" id="lembrar" class="pl mhl" />
					<label for="lembrar" id="lembrarlabel" class="mute"> Aceito os Termos</label>
					<a name="cadastrar" id="cadastrar" class="input_button mini pr" onclick="cadastro();">Cadastrar</a>
					<div class="cleaner"></div>
				</form>
			</div>



			<div class="cleaner"></div>
			<br>
			<br>
			<span class="text" style="color:#333">Ou voltar para <a class="underline" href="<?php echo System::getBase(); ?>login/">login</a></span>

		</div>
	</div><!-- CONTENT -->

	<?php include_once("gui/footer.php"); ?>

</div><!-- GLOBAL -->

<div id="superbgimage">
	<img src="images/backgrounds/bg10.png" alt="" />
</div>



<script type="text/javascript">
function cadastro(){

	var nome = document.getElementById("nome");
	var telefone = document.getElementById("telefone");
	var datanasc = document.getElementById("datanasc");
	var sexo = document.getElementById("sexo");
	var cpf = document.getElementById("cpf");
	var cidade = document.getElementById("cidade");
	var estado = document.getElementById("estado");
	var pais = document.getElementById("pais");
	var profissao = document.getElementById("profissao");
	var trabalho = document.getElementById("trabalho");
	var escolaridade = document.getElementById("escolaridade");
	var escola = document.getElementById("escola");
	var idiomas = document.getElementById("idiomas");
	var descricao = document.getElementById("descricao");
	var email = document.getElementById("email");
	var senha = document.getElementById("senha");


	var verified_inputs = new Array(
		nome, 
		telefone, 
		datanasc, 
		sexo, 
		// cpf, 
		cidade, 
		estado, 
		pais, 
		profissao, 
		// trabalho, 
		escolaridade, 
		// escola, 
		idiomas, 
		descricao, 
		email, 
		senha
	);

	var regex_email = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
	var has_error = false;

	for(var i=0; i<verified_inputs.length; i++) {
		var element = verified_inputs[i];
		if(element.value == ""){
			element.style.borderColor = "#C94A4A";
			element.focus();
			has_error = true;
			break;
		}
		else if(element.id == "sexo" && element.value == "Selecione seu sexo"){
			element.style.borderColor = "#C94A4A";
			element.focus();
			has_error = true;
			break;
		}
		else if(element.id == "email" && !(regex_email.test(element.value))){
			element.style.borderColor = "#C94A4A";
			element.focus();
			has_error = true;
			break;
		}
		else{
			element.style.borderColor = "#CBCBCB";
		}
	}

	if(has_error == true){
		return;
	}
	else if(document.getElementById("lembrar").checked != true){
		document.getElementById("lembrarlabel").style.color = "#C94A4A";
		document.getElementById("lembrarlabel").style.textDecoration = "underline";
	}
	else{
		document.getElementById("cadastrar").innerHTML = 'Entrando...';
		document.form_cadastro.submit();
	}
}




</script>