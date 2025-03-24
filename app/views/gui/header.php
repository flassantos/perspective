<img src="images/backgrounds/<?php echo ($view_sobre['fundo']) ? $view_sobre['fundo'] : 'bg1.png'; ?>" id="background" />

<div id="header" align="center">

	<div id="nav" class="sub_content">
		<div id="nav_left"></div>
		<div id="nav_center"></div>
		<div id="nav_right"></div>

		<div id="nav_over">

			<a style="float: left; opacity: 0.3; margin-top: 25px; margin-left: 0px; margin-right: 20px;" href="<?php echo System::getBase(); ?>logout">
				<img title="Sair" id="sair" src="images/icons/up.png" width="32" class="icons" />
			</a>

			<a title="Ir para home" id="logo" href="<?php echo System::getBase(); ?>">
				<img src="images/logo.png" />
			</a>

			<div id="popover" class="popover mini">
				<div id="poparrow" class="poparrow"></div>

				<div class="popcontent">
				</div>

			</div><!-- POPOVER -->

			<div id="news">
				<span class="divisor"></span>
				<a href="<?php echo System::getBase(); ?>notifications"><img title="Ver notificações" id="notifications" src="images/icons/world.png" width="32" class="icons" /></a>
				<?php if(count($view_publicacoes) > 0) { ?>
					<span id="notifications_msg" class="message"><?php echo count($view_publicacoes); ?></span>
				<?php 
				}
				else{
				?>
				<span id="notifications_msg" class="message"><?php echo random_int(1, 3); ?></span>
				<?php
				} 
				?>

				<span class="divisor"></span>
				<img id="requests" src="images/icons/people_add.png" width="32" class="icons" />
				<?php if(count($view_requisicoes) > 0) { ?>
					<span id="requests_msg" class="message"><?php echo count($view_requisicoes); ?></span>
				<?php } ?>
				<span class="divisor"></span>
				<img id="settings" src="images/icons/settings.png" width="32" class="icons" />
				<span class="divisor"></span>


				
			</div>

			

			
			<div id="slave_notifications" class="dnone">

				<span class="sub_title">Notificacoes Recentes</span>
				<br>
				<div class="line"></div>
				<div class="mh"></div>

				<?php if(count($view_publicacoes) > 0) { 

					foreach ($view_publicacoes as $value) {
						$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
						$urlped2 = "&amp;fltr[]=gam|1.2&amp;fltr[]=usm;q=100&amp;w=158&amp;h=170&amp;zc=1";
						$url = $urlped.$value['foto_usuario'].$urlped2;
				?>
				<div class="subitensh">

					<img src="<?php echo $url; ?>" class="pl mhr" width="50" />
					<div class="reqinfos">
						<a href="<?php echo System::getBase(); ?>user/<?php echo $value['nome_usuario_url']; ?>/">
							<span class="title">
								<?php echo $value['nome_usuario']; ?>
							</span>
						</a>
						<div class="mh"></div>
						<span class="text">
							Publicou no seu mural.
						</span>
					</div>
					<div class="cleaner"></div>
				</div>
				<?php 
					}
				}
				else{
					echo "Nenhuma notificacao recente. <br> <br>";
				}
				?>

			</div>



			<div id="slave_requests" class="dnone">

				<span class="sub_title">Requisicoes de Amizade</span>
				<br>
				<div class="line"></div>
				<div class="mh"></div>

				<?php if(count($view_requisicoes) > 0) { 

					foreach ($view_requisicoes as $value) {
						$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
						$urlped2 = "&amp;fltr[]=gam|1.2&amp;fltr[]=usm;q=100&amp;w=158&amp;h=170&amp;zc=1";
						$url = $urlped.$value['foto_usuario'].$urlped2;
				?>
				<div class="subitens">
					<img src="<?php echo $url; ?>" class="pl mhr" width="50" />
					<div class="reqinfos">
						<a href="<?php echo System::getBase() ?>user/<?php echo $value['nome_usuario_url']; ?>/">
							<span class="title">
								<?php echo $value['nome_usuario']; ?>
							</span>
						</a>
						<div class="mh"></div>
						<a class="input_button mini pl mhr" href="<?php echo System::getBase(); ?>add/accept/<?php echo $value['nome_usuario_url']; ?>/">Aceitar</a>
						<a class="input_button mini pl" href="<?php echo System::getBase(); ?>add/reject/<?php echo $value['nome_usuario_url']; ?>/">Recusar</a>
					</div>
					<div class="cleaner"></div>
				</div>
				<?php 
					}
				}
				else{
					echo "Nenhuma requisicao recente. <br> <br>";
				}
				?>

			</div>


			<div id="slave_settings" class="dnone">
				<span class="sub_title">Configuracoes Gerais</span>
				<br>
				<div class="line"></div>
				<div class="mh"></div>

				<span class="tint">»</span> <a class="linksx" href="<?php echo System::getBase(); ?>account/">Configurar Conta</a>
				<div class="mh"></div>
				<span class="tint">»</span> <a class="linksx" href="<?php echo System::getBase(); ?>profile/">Configurar Perfil</a>
				<div class="mh"></div>

				<!-- 
				<span class="tint">»</span> <a class="linksx" href="<?php echo System::getBase(); ?>logout/">Sair da Perspective</a>
				<div class="mh"></div>
 				-->
			</div>


			<div id="popover_search" class="popover">
			<div id="poparrow_search" class="poparrow"></div>
				<div class="popcontent">
					<span class="sub_title">Usuarios Encontrados</span>
					<br>
					<div class="line"></div>
					<div class="mh"></div>
					<div id="usuariosencontrados"></div>
					

					<?php
					foreach ($view_pesquisar as $value) {
						$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
						$urlped2 = "&amp;fltr[]=gam|1.2&amp;fltr[]=usm;q=100&amp;w=50&amp;h=50&amp;zc=1";
						$url = $urlped.$value['foto'].$urlped2;
					?>
					<a href="<?php echo System::getBase() ?>user/<?php echo $value['nome_url']; ?>/">
					<div class="subitensh">
						<img src="<?php echo $url; ?>" class="pl mhr" />
						<div class="reqinfos">
							<span class="title" data-nome="<?php echo $value['nome']; ?>" data-cidade="<?php echo $value['cidade_uf']; ?>">
								<?php echo $value['nome']; ?>
							</span>
							<div class="mh"></div>
							<span class="text">
								<?php echo ($value['cidade_uf']!='default') ? $value['cidade_uf'] : 'NA'; ?>
							</span>
						</div>
						<div class="cleaner"></div>
					</div>
					</a>

					<?php
					}
					?>

					<div class="mh"></div>
					<div align="center">
						<a class="linksx" onclick="ver_resultados();">Ver mais resultados</a>
					</div>
					<div class="mh"></div>
					

				</div>

			</div><!-- POPOVER -->

			<input type="hidden" id="totaldepesq" value="<?php echo count($view_pesquisar); ?>" />

			<div id="search">
				<a style="cursor: pointer;"><img src="images/icons/sb.png" class="icon_search" /></a>
				<span class="input_text_left"></span>
				<input id="search_friends" type="text" class="input_text" placeholder="Buscar amigos" />
				<span class="input_text_right"></span>
			</div>







		</div>

	</div><!-- NAV -->

</div><!-- HEADER -->



<script type="text/javascript">
$(document).ready(function(e) {
	var id = null;
	var intid = null;
	var lastid = null;
	var intxd = null;
	var goprox = true;
	
    $("#news .icons").hover(function(){

    	id = $(this).attr("id");
    	if(id == "notifications"){
    		return;	
    		$("#popover").css("margin-left", "200px");
    		$("#popover").removeClass("mini");
    	}
    	else if(id == "requests"){
    		$("#popover").css("margin-left", "255px");
    		$("#popover").removeClass("mini");
    	}
    	else if(id == "settings"){
    		$("#popover").css("margin-left", "310px");
    		$("#popover").addClass("mini");
    	}

    	var content = $("#slave_"+id).html();
    	$("#popover .popcontent").html(content);

    	if($(this).attr("id") != lastid)
    		$("#popover").hide();

    	lastid = $(this).attr("id");
		if(intid) clearInterval(intid);
		if(intxd) clearInterval(intxd);
		goprox = true;
		$("#popover").fadeIn("fast");
	}, function(){
		intid = setInterval(function(){
			if(goprox)
				$("#popover").fadeOut("fast");
		}, 1000);
	});
	
	$("#popover").hover(function(){
		if(intid) clearInterval(intid);
		if(intxd) clearInterval(intxd);
		goprox = false;
		$("#popover").show();

		if(id == "notifications"){
	    	$("#notifications_msg").hide("slow");	
	  		// $.ajax({
			// 	method:"get",
			// 	url:"<?php echo System::getBase(); ?>app/models/ajaxModel.php",
			// 	data:"tipo=notificacoes&id="+<?php echo $IDGLOBAL; ?>
			// });
		}

	}, function(){
		intxd = setInterval(function(){
			goprox = true;
			$("#popover").fadeOut("fast");
		}, 1000);
	});


	var total = $("#totaldepesq").val();

	$("#search_friends").bind('keyup', function(){
		var sthis = $(this);
		if(sthis.val() != ""){
			$("#popover_search").fadeIn("fast");

			var psq = sthis.val().toLowerCase();
			$('#popover_search .subitensh').each(function(){
				if($(this).find('.title').attr('data-nome').toLowerCase().indexOf(psq) != -1){
					$(this).show();
					$(this).attr("rev", "ok");
					$(this).attr("rel", "groupx");
				}
				else if($(this).find('.title').attr('data-cidade').toLowerCase().indexOf(psq) != -1){
					$(this).show();
					$(this).attr("rev", "ok");
					$(this).attr("rel", "groupx");
				}
				else{
					$(this).hide();
					$(this).attr("rev", "notok");
					$(this).attr("rel", "group");
				}
			});
			
			if($("#popover_search .subitensh[rev=notok]").length == total){
				$("#usuariosencontrados").html("Nenhum usuario encontrado.");
			}
			else{
				$("#usuariosencontrados").hmtl("");
			}

		}
	});



	$("#search_friends").blur(function(){
		$("#popover_search").fadeOut("fast");
	});

});



function ver_resultados(){
	var base = "<?php echo System::getBase(); ?>search/";
	var result = document.getElementById("search_friends");
	if(result.value == "" || result.value == "Buscar amigos")
		result.style.border = "1px solid #C94A4A";
	else
		window.location.href = base+result.value+"/";
}

</script>

