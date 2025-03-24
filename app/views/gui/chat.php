<div id="chat">
	<div id="chat_top">
		Bate-Papo
		<input type="text" id="search_chat" placeholder="Procurar...">
	</div>

	<div id="chat_middle">
		<div class="chat_content">
		<!-- <div class="error mht bold" align="center">Bate-Papo em manutenção.</div> -->
		<?php 
		function is_friend($id, $view_amigosok, $IDGLOBAL){
			if($id == $IDGLOBAL){
				return false;
			}
			foreach ($view_amigosok as $k => $v){
				if($v['id_usuario'] == $id or $v['id_amigo'] == $id){
					return true;
				}
			} 
			return false;
		};
		$tam = count($view_pesquisar)+1;
		$num_friends = 0;
		foreach ($view_pesquisar as $key => $value) {
			if(!is_friend($value['id'], $view_amigosok, $IDGLOBAL)){
				continue;
			}
			$num_friends += 1;

			$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
			$urlped2 = "&amp;q=80&amp;w=40&amp;h=40&amp;zc=1";
			$url = $urlped.$value['foto'].$urlped2;
			if(rand(0, $tam) % ($key+2) == 0)
				$varn = 'n';
			else
				$varn = '';
		?>
			<div class="chat_user" data-id="<?php echo $key+1; ?>">
				<img src="<?php echo $url; ?>" />
				<span class="nome"><?php echo $value['nome']; ?></span>
				<span class="<?php echo $varn; ?>status">•</span>
				<div class="cleaner"></div>
			</div>

		<?php
		}

		if($num_friends == 0){
			echo "<div class='mht bold' align='center'>Voce ainda nao tem amigos :(</div> <br><br>";
		}
		?>
			
			<div id="cont_fanboxes"></div>
		</div>
	</div>

	<div id="chat_bottom"></div>
	
</div><!-- CHAT -->

<div class="cleaner"></div>

<?php 
// print_r($view_pesquisar);
foreach ($view_pesquisar as $key => $value) {
	$idname=$value['nome_url'];
?>
	<div id="selectormsg_<?php echo $key+1; ?>" class="dnone dialog" title="<?php echo $value['nome']; ?>">
		<form name="form_messages_<?php echo $idname; ?>" id="form_messages_<?php echo $idname; ?>" method="post" action="<?php echo System::getBase(); ?>messages/reply/<?php echo $value['id']; ?>/">
			

			<br>
			<textarea class="input_text_area" placeholder="Enviar mensagem..." style="width:90%; max-height: 42px;"></textarea>
			<div class="mh"></div>
			<div class="sucessomsg" style="display: none">Mensagem enviada com sucesso.</div>
			<a class="mhl linksx" href="<?php echo System::getBase(); ?>user/<?php echo $value['nome_url']; ?>/">Ver perfil de <?php echo $value['nome']; ?></a>
			<div class="mh"></div>
			<div style="height: 100px"></div>
			<a class="input_button mini btnenvchat" rel="<?php echo $idname; ?>" id_amigo="<?php echo $value['id']; ?>">Enviar</a>
			<div class="mh"></div> 

		</form>
	</div>
<?php } 
?>



<link href="scripts/scrollbar/perfect-scrollbar.css" rel="stylesheet">
<script type="text/javascript" src="scripts/scrollbar/jquery.mousewheel.js"></script>
<script type="text/javascript" src="scripts/scrollbar/perfect-scrollbar.js"></script>
<script type="text/javascript" src="scripts/jquery.sticky.js"></script>

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
<!-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->
<link rel="stylesheet" href="scripts/jquery-ui.css" />
<script type="text/javascript" src="scripts/jquery-ui.js"></script>


<script type="text/javascript">

$(document).ready(function(){
	
	var hp = $(window).height()-200;
	$("#chat_middle").css("height", hp);
	
	$('#chat_middle').perfectScrollbar({
		wheelSpeed: 50
	});
	$("#chat").sticky({ 
		topSpacing: 20
	});

	var total = $("#chat_middle .chat_user").length;

	$("#search_chat").bind('keyup', function(){

		var psq = $(this).val().toLowerCase();
		
		if(psq == "pesquisar"){
			jAlert("errado", "Digite uma pesquisa que contenha pelo menos 2 caracteres");
			return false;
		}
		else{
			$('.chat_user').each(function(){
				if($(this).find('.nome').html().toLowerCase().indexOf(psq) != -1){
					$(this).show();
					$(this).attr("data-rel", "ok");
				}
				else{
					$(this).hide();
					$(this).attr("data-rel", "notok");
				}
			});
			
			if($("#search_chat .chat_user[data-rev=notok]").length == total){
				$("#cont_fanboxes").html("<br><center><span class='text'>Nenhum amigo encontrado.</span></center>");
			}
			else{
				$("#cont_fanboxes").html("");
			}	
		
		}
			
	});


	$('.dialog').dialog({
        autoOpen: false,
        width: 350,
        maxWidth: 350,
        height: 300,
        maxHeight: 350,
        draggable: false,
        buttons: false,
        resizable: false,
        position: { my: "center", at: "center", of: window },
    });
 
    $('#chat_middle .chat_user').click(function(){
	    var id_link = $(this).attr('data-id');
	    $('#selectormsg_'+id_link).dialog('open');
	    return false;
    });

    $(".dialog .btnenvchat").live("click", function(){
		var rel = $(this).attr("rel");
		if($("#form_messages_"+rel+" textarea").val() == "")
			$("#form_messages_"+rel+" textarea").css("border", "1px solid #C94A4A");
		else{
			var id_user=<?php echo $IDGLOBAL; ?>;
			var id_amigo=$(this).attr("id_amigo");
			var mensagem=$("#form_messages_"+rel+" textarea").val();
			$.ajax({
				method:"get",
				url:"<?php echo System::getBase(); ?>app/models/ajaxModel.php",
				data:"tipo=mensagens&acao=inserir&id_user="+id_user+"&id_amigo="+id_amigo+"&conteudo="+mensagem,
				success: function(filtrar){
					// $("#form_messages_"+rel+" .sucessomsg").show();
					$("#form_messages_"+rel+" textarea").val("");	
				}
						
			});	
			
		}
	});

});

</script>