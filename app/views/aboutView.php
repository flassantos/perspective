<div id="global" align="center">

	<?php include_once("gui/header.php"); ?>

	<div id="content" align="center">
		<div class="sub_content">
			<?php 
				include_once("gui/profile.php");
			?>


			<div id="mural">

			<img src="images/icons/info_w.png" width="36" class="icons" /> <span class="title_pag">SOBRE</span>
			<div class="lineo"></div>
			<br>
			<br>

			<?php  if($IDGLOBAL == $view_sobre['id']){  ?>


				<?php 
				if(System::getUrl(1) == 'editmode'){
				?>
				<div id="post_message">
					<div id="post_message_top">
						<img src="images/icons/info_w.png" width="24" class="icons" /> Sobre - Editar
						
						<!-- <a class="input_button mini tooltip pr mhr edit" title="Editar"><img src="images/icons/pen.png" width="12" class="nmh" /></a> -->
						
					</div>

					<style type="text/css">
						#form_sobre input{
							width: 520px;
						}
						#form_sobre select{
							width: 540px;
						}
						#form_sobre textarea{
							min-height: 70px;
							width: 550px
							min-width: 550px;
							max-width: 550px;
							font-family: Calibri, Arial; 
							border-radius: 20px; 
							margin-left: 0px; 
						}


					</style>

					<div id="post_message_middle">
						<br>
						<br>
						<div class="text">	
							<form name="form_sobre" id="form_sobre" action="<?php echo System::getBase(); ?>about/editar/" method="post" enctype="multipart/form-data">
	
								<span class="input_text_left"></span>
								<input type="text" name="nome" id="nome" class="input_text" placeholder="Nome Completo" size="45" autocomplete="off" />
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="telefone" id="telefone" class="input_text" placeholder="Telefone" size="45" autocomplete="off" />
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="datanasc" id="datanasc" class="input_text" placeholder="Data de Nascimento" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <select name="sexo" id="sexo" class="input_text" placeholder="Sexo" style="padding: 12px 0px; height: 100%;">
                                  <option selected="true" disabled="disabled">Selecione seu sexo</option>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Feminino">Feminino</option>
                                  <option value="Outro">Outro</option>
                                </select>
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="cpf" id="cpf" class="input_text" placeholder="CPF (opcional)" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="cidade" id="cidade" class="input_text" placeholder="Cidade" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="estado" id="estado" class="input_text" placeholder="Estado ou Distrito" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="pais" id="pais" class="input_text" placeholder="País" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <div class="mh"></div>

                                <textarea name="locais" id="locais" class="input_text_area" rows="2" placeholder="Locais onde já morou (opcional)" style=""></textarea>
                                <div class="mh"></div>

                                <span class="input_text_left"></span>
                                <input type="text" name="aniversario" id="aniversario" class="input_text" placeholder="Data de aniversário" size="45" autocomplete="off" />
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="profissao" id="profissao" class="input_text" placeholder="Profissão" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="trabalho" id="trabalho" class="input_text" placeholder="Local de trabalho (opcional)" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="escolaridade" id="escolaridade" class="input_text" placeholder="Escolaridade" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="escola" id="escola" class="input_text" placeholder="Local de estudo (opcional)" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>
                                
                                <span class="input_text_left"></span>
                                <input type="text" name="idiomas" id="idiomas" class="input_text" placeholder="Idiomas" size="45" autocomplete="off">
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <br>

                                <span class="input_text_left"></span>
                                <input type="text" name="celular" id="celular" class="input_text" placeholder="Celular" size="45" autocomplete="off" />
                                <span class="input_text_right"></span>
                                <div class="cleaner"></div>
                                <div class="mh"></div>

                                

                                <textarea name="musicas" id="musicas" class="input_text_area" rows="2" placeholder="Quais são suas músicas favoritas?"></textarea>
                                <div class="mh"></div>

                                <textarea name="filmes" id="filmes" class="input_text_area" rows="2" placeholder="Quais são os seus filmes/series favoritos?"></textarea>
                                <div class="mh"></div>

                                <textarea name="livros" id="livros" class="input_text_area" rows="2" placeholder="Quais são os seus livros favoritos?"></textarea>
                                <div class="mh"></div>

                                

                                <textarea name="descricao" id="descricao" class="input_text_area" rows="4" placeholder="Descrição sobre você"></textarea>
                                <div class="cleaner"></div>
                                <br> 

								<br>
								<a class="input_button pl" id="enviar_foto_bt" onclick="editar_sobre();"><img src="images/icons/up.png" width="18" />Enviar</a>
								<div id="errorfoto" class="error pl mhl mht"></div>
								<br>
							</form>
						</div>
					</div>

					<div id="post_message_bottom">
					</div>


					<link rel="stylesheet" href="scripts/trumbowyg/dist/ui/trumbowyg.min.css">
					<script src="scripts/trumbowyg/dist/trumbowyg.min.js"></script>

					<!-- <script src="scripts/trumbowyg/dist/plugins/upload/trumbowyg.cleanpaste.min.js"></script> -->

					<link rel="stylesheet" href="scripts/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css">
					<script src="scripts/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js"></script>

					<link rel="stylesheet" href="scripts/trumbowyg/dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
					<script src="scripts/trumbowyg/dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

					<link rel="stylesheet" href="scripts/trumbowyg/dist/plugins/giphy/ui/trumbowyg.giphy.min.css">
					<script src="scripts/trumbowyg/dist/plugins/giphy/trumbowyg.giphy.min.js"></script>

					<!-- 
					<script src="scripts/trumbowyg/dist/plugins/resizimg/resolveconflict-resizable.min.js"></script>
					<script src="scripts/trumbowyg/dist/plugins/resizimg/jquery-resizable.min.js"></script>
					<script src="scripts/trumbowyg/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
					 -->


					<script type="text/javascript">

					$('#descricao').trumbowyg({
						lang: 'pt_br',
						btns: [
							['emoji'],
					        ['strong', 'em', 'del'],
					        ['foreColor'],
					        ['link'],
					        ['insertImage'],
					        ['giphy'],
					        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
					        // ['unorderedList', 'orderedList'],
					        ['horizontalRule'],
					        // ['removeformat'],
					        // ['fullscreen'],
					    ],
					    autogrow: true,
					    imageWidthModalEdit: true,
					    plugins: {
					        giphy: {
					            apiKey: 'LvMKgBcGpNIqIkOuqdy1unb6P6FQrCd6'
					        }
					    }
					});

				</script>

				</div><!-- POST_MESSAGE -->

				<?php 
				}
				elseif(System::getUrl(1) == 'confirmmode'){
				?>


				<div id="post_message">
					<div id="post_message_top">
						<img src="images/icons/info_w.png" width="24" class="icons" /> Sobre - Editar
						
					</div>

					

					<div id="post_message_middle">
						<br>
						<br>
						<div class="text">	
							<!-- <p>Dados salvos com sucesso.</p> -->
							<div class="mh"></div>
							<br>
							<a class="input_button mhr" href="<?php echo System::getBase(); ?>about">Continuar</a>
						</div>
					</div>

					<div id="post_message_bottom">
					</div>

				</div><!-- POST_MESSAGE -->

				<?php
					}
				} // edit page
				?>


				<?php 
				if(System::getUrl(1) != 'editmode' and System::getUrl(1) != 'confirmmode'){
				?>
				<div id="post_message">
					<div id="post_message_top">
						
						<a class="input_button mini tooltip pr mhr edit" title="Editar" href="<?php echo System::getBase(); ?>about/editmode/"><img src="images/icons/pen.png" width="12" class="nmh" /> Editar</a>
						<span>Informações Pessoais</span> 
						
						
					</div>

					<?php

					function echo_default($txt, $null_val="", $msg="NA"){
						if($txt == $null_val || $txt == ""){
							echo $msg;
						}
						else{
							echo $txt;
						}
					}

					?>

					<style type="text/css">
						#descricaobox p img{
							display: block;
							max-width:595px !important;
							object-fit: cover;
						}

                        #post_message_middle div{
                            text-shadow: none;
                        }

                        #post_message_middle div b{
                            text-shadow:0px 1px 1px rgba(0,0,0,0.25);
                        }

					</style>

					<div id="post_message_middle">
						<br>
						<br>
						<div class="text basic">

						<b>Nome:</b> <?php echo $view_sobre['nome']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>E-mail:</b> <a href="mailto:<?php echo $view_sobre['email']; ?>" class="linksx"><?php echo $view_sobre['email']; ?></a>
                        <div class="mh"></div><div class="mh"></div>
                        
                        <b>Telefone:</b> <?php echo $view_sobre['telefone']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>CPF:</b> <?php echo echo_default($view_sobre['cpf']); ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Sexo:</b> <?php echo $view_sobre['sexo']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Data de Nascimento:</b> <?php echo $view_sobre['data_nascimento']; ?>
                        <div class="mh"></div><div class="mh"></div>
                        
                        <b>Cidade:</b> <?php echo_default($view_sobre['cidade_uf'], "default"); ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Estado:</b> <?php echo $view_sobre['estado']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>País:</b> <?php echo $view_sobre['pais']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Locais onde morou:</b> <?php echo_default($view_sobre['locais']); ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Profissão:</b> <?php echo $view_sobre['profissao']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Locais de trabalho:</b> <?php echo_default($view_sobre['trabalho']); ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Escolaridade:</b> <?php echo $view_sobre['escolaridade']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Locais de estudo:</b> <?php echo_default($view_sobre['escola']); ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Idiomas:</b> <?php echo $view_sobre['idiomas']; ?>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Músicas favoritas:</b> <p><?php echo_default($view_sobre['musicas']); ?></p>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Filmes e séries favoritos:</b> <p><?php echo_default($view_sobre['filmes']); ?></p>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Livros favoritos:</b> <p><?php echo_default($view_sobre['livros']); ?></p>
                        <div class="mh"></div><div class="mh"></div>

                        <b>Descrição:</b> 
                        <div id="descricaobox"><?php echo $view_sobre['descricao']; ?></div>
						

					</div>
					</div>

					<div id="post_message_bottom">
					</div>

				</div><!-- POST_MESSAGE -->
				


				<br>
				<br>
				<br>
				<br>


				<span class="title sub">Publicacoes Recentes</span>
				<div class="line"></div>


				<?php 

				$urlped = "system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
				$urlped2 = "&amp;q=80&amp;w=120&amp;h=130&amp;zc=1";
				foreach ($view_publicacoes_ult as $key => $value) {
					$url = System::getBase().$urlped.$value['foto_usuario'].$urlped2;
				?>
				<div class="publications">
				<?php if($key > 0){ ?><div class="line"></div><?php } ?>
					
					<img class="headimg" src="<?php echo $url; ?>" width="80" height="80" class="pl" />
					<div class="headers">
						<span class="title"><?php echo $view_sobre['nome']; ?></span> 
						<span class="normal">publicou no <?php echo ($value['id_usuario'] == $view_sobre['id']) ? "seu proprio mural" : "mural de <a class='linksx' href='".System::getBase()."user/".$value['nome_usuario_url']."/'>".$value['nome_amigo']."</a>"; ?></span>
						<div class="mh"></div>
						<span class="mute"><img src="images/icons/clock.png" width="16" /> <?php echo $value['data'] ?></span>
					</div>

					<div class="cleaner"></div>
					<br>

					<div class="text">
					<?php echo nl2br($value['conteudo']); ?>
					</div>

					<div class="cleaner"></div>
					<br><br>

				</div><!-- PUBLICATIONS -->

				<?php
				}
				if(count($view_publicacoes_ult) <= 0)
							echo "<center><span class='sub basic mute'>Nenhuma publicacao cadastrada.</span></center>";
				?>

				<?php
				} // editmode
				?>
				<div id="message_divisor"></div>

			</div>

			<?php
				include_once("gui/chat.php");
			?>

		</div>
	</div><!-- CONTENT -->

	<?php include_once("gui/footer.php"); ?>

</div><!-- GLOBAL -->

<script type="text/javascript">

function editar_sobre(){

	var nome = document.getElementById("nome");
	var telefone = document.getElementById("telefone");
	var datanasc = document.getElementById("datanasc");
	var sexo = document.getElementById("sexo");
	var cpf = document.getElementById("cpf");
	var cidade = document.getElementById("cidade");
	var estado = document.getElementById("estado");
	var pais = document.getElementById("pais");
	var locais = document.getElementById("locais");
    var unnecessary_aniversario = document.getElementById("aniversario");
	var profissao = document.getElementById("profissao");
	var trabalho = document.getElementById("trabalho");
	var escolaridade = document.getElementById("escolaridade");
	var escola = document.getElementById("escola");
	var idiomas = document.getElementById("idiomas");
    var unnecessary_celular = document.getElementById("celular");
	var musicas = document.getElementById("musicas");
	var filmes = document.getElementById("filmes");
	var livros = document.getElementById("livros");
	var descricao = document.getElementById("descricao");


	var verified_inputs = new Array(
		nome, 
		telefone, 
		datanasc, 
		sexo, 
		// cpf, 
		cidade, 
		estado, 
		pais, 
		// locais,
        unnecessary_aniversario,
		profissao, 
		// trabalho, 
		escolaridade, 
		// escola, 
		idiomas, 
        unnecessary_celular,
		musicas,
		filmes,
		livros,
		descricao 
	);

	var has_error = false;
	for(var i=0; i<verified_inputs.length; i++) {
		var element = verified_inputs[i];
		if(element.value == ""){
			element.style.border = "1px solid #C94A4A";
			element.focus();
			has_error = true;

			if(element.id == "descricao"){
				document.getElementById("errorfoto").innerHTML = "Digite uma descrição sobre você...";
			}

			break;
		}
		else if(element.id == "sexo" && element.value == "Selecione seu sexo"){
			element.style.border = "1px solid #C94A4A";
			element.focus();
			has_error = true;
			break;
		}
		else{
			element.style.border = "none";
			document.getElementById("errorfoto").innerHTML = "";
		}
	}

	if(has_error == true){
		return;
	}
	else{
		document.getElementById("enviar_foto_bt").innerHTML = "Enviando...";
		// document.form_sobre.submit();
		document.getElementById("form_sobre").submit();
	}

}

</script>

<?php include_once("gui/scripts.php"); ?>