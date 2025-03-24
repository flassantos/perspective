
<div id="mural">

	<div id="post_message">
		<div id="post_message_top">
			Publicar no mural de <?php echo $view_sobre['nome']; ?>
		</div>

		<div id="post_message_middle">
			<form name="form_publicacao_post" id="form_publicacao_post" action="<?php echo System::getBase(); ?>publish/send/<?php echo $view_sobre['id']; ?>/" method="post" enctype="multipart/form-data"
				style="max-width: 624px; margin-left: 20px;" 
				>

				<textarea class="input_text_area" id="postmessagearea" name="postmessagearea" placeholder="Escreva alguma coisa..."

				></textarea>
			</form>
		</div>

		<div id="post_message_bottom">
			<div id="itens">
				<?php 
				if($view_pub || $IDGLOBAL == $view_sobre['id']){
				?>
				<!-- 
				<img src="images/icons/image.png" class="icons tooltip" title="Adicionar Imagem" width="24" />
				<span class="divisor"></span>
				<img src="images/icons/clip.png" class="icons tooltip" title="Adicionar Amigo" width="24" />
				<span class="divisor"></span>
				<img src="images/icons/location.png" class="icons tooltip" title="Adicionar Localizacao" width="24" />
				<span class="divisor"></span>
				<img src="images/icons/clock.png" class="icons tooltip" title="Adicionar Tempo" width="24" /> 
				-->

				<a class="input_button pr mini" onclick="publicar_post();">
					<img src="images/icons/tick.png" width="16" />
					<span id="publicpostbt">Publicar</span>
				</a>
				<?php 
				}
				else{
				?>
				<a class="input_button pr mini" onclick="mostrar_erro();">
					<img src="images/icons/tick.png" width="16" />
					<span id="publicpostbt">Publicar</span>
				</a>
				<span id="erronaoamigomural" class='pl mhl error' style="display: none;">É necessário ser amigo de <b><?php echo $view_sobre['nome']; ?></b> para publicar no seu mural.</span>
				<?php
				}
				?>
			</div>
		</div>

	</div><!-- POST_MESSAGE -->

	<div id="message_divisor"></div>

	<div id="thepublications">
		<?php

		$count = 0;
			foreach ($view_postagens as $value) {
				$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
				$urlped2 = "&amp;fltr[]=gam|1.2&amp;fltr[]=usm;q=80&amp;w=80&amp;h=80&amp;zc=1";
				$url = $urlped.$value['foto_usuario'].$urlped2;
		?>

		<div class="publications">
			<div class="line"></div>
			<a href="<?php echo System::getBase(); ?>user/<?php echo $value['nome_usuario_url']; ?>/"><img class="headimg" src="<?php echo $url; ?>" class="pl" /></a>
			<div class="headers">
				<a class="linksx" href="<?php echo System::getBase(); ?>user/<?php echo $value['nome_usuario_url']; ?>/"><span class="title"><?php echo $value['nome_usuario']; ?></span></a>
				<span class="normal">publicou no <?php if($value['id_usuario'] == $view_sobre['id']) echo "seu proprio mural."; else echo "no mural de ".$view_sobre['nome']; ?></span>
				<div class="mh"></div>
				
				<span class="mute"><img src="images/icons/clock.png" width="16" /> <?php echo $value['data'] ?></span>
				
			</div>

			<?php if($IDGLOBAL == $value['id_usuario']){ ?>	
			<a onclick="deletar_post('<?php echo $count; ?>');">
				<div class="block tooltip" title="Deletar Publicacao">
					<img src="images/icons/block.png" width="24" />
				</div>
			</a>
				
			<a id="slave_delete_<?php echo $count; ?>" href="<?php echo System::getBase(); ?>publish/delete/<?php echo $value['id']?>/"></a>
			<?php } ?>

			<div class="cleaner"></div>
			<br>

			<style type="text/css">
				.conteudobox p img{
					display: block;
					max-width:628px !important;
					object-fit: cover;
				}
			</style>

			<div class="text conteudobox">
			<?php echo $value['conteudo']; ?>
			</div>
			<br>

			<a class="input_button pl mini mhr comment" rel="<?php echo $count; ?>" rev="0">
				<img src="images/icons/pen.png" width="16" />
				Comentar
			</a>

			<a class="input_button pl mini mhr likebutton" rel="<?php echo $value['id']; ?>" rev="<?php echo $value['num_curtir']; ?>">
				<img src="images/icons/like.png" width="16" />
				Curtir <span id="numlike_<?php echo $value['id']; ?>" class="numb"><?php echo ($value['num_curtir']>0) ? "(".$value['num_curtir'].")" : ""; ?></span>
			</a>

			<div class="cleaner"></div>
			<br>

			<form name="form_comment_<?php echo $count; ?>" id="form_comment_<?php echo $count; ?>" action="<?php echo System::getBase(); ?>comment/add/<?php echo $value['id']; ?>/<?php echo $view_sobre['id']; ?>/" method="post" enctype="multipart/form-data">
				<textarea id="pub_textarea_<?php echo $count; ?>" name="conteudo_comentario" class="input_text_area dnone" cols="60" rows="3" placeholder="Escreva um comentario..."></textarea>
				<div class="mh"></div>
				<a id="pub_button_<?php echo $count; ?>" rel="<?php echo $count; ?>" class="input_button mini dnone envbtcomment">Enviar</a>
			</form>

			<div class="mh"></div>

			<?php
			foreach ($value['comentarios'] as $key => $value) {
				
				$urlped = System::getBase()."system/helpers/phpThumb/phpThumb.php?src=../../../_assets/uploads/fotos_perfil/";
				$urlped2 = "&amp;fltr[]=gam|1.2&amp;fltr[]=usm;q=80&amp;w=50&amp;h=50&amp;zc=1";
				$url = $urlped.$value['comment_foto_usuario'].$urlped2;

			?>
			<div id="comment_num_<?php echo $count; ?>" class="comments">

				<?php if($IDGLOBAL == $value['id_usuario']){ ?>	
				<a onclick="deletar_comment('<?php echo $count+$key; ?>');" class="pr">
					<div class="block tooltip" title="Deletar Comentario">
						<img src="images/icons/block.png" width="14" />
					</div>
				</a>
					
				<a id="slave_delete_comment_<?php echo $count+$key; ?>" href="<?php echo System::getBase(); ?>comment/delete/<?php echo $value['id']?>/<?php echo $view_sobre['nome_url']; ?>/"></a>
				<?php } ?>

				<a class="pl pl mhr tooltip" title="<?php echo $value['comment_nome_usuario']; ?>" href="<?php echo System::getBase(); ?>user/<?php echo $value['comment_nome_url']; ?>/">
					<img class="pic" src="<?php echo $url; ?>" />
				</a>
				<div class="text">
					<?php echo $value['conteudo']; ?>
				</div>
				<div class="cleaner"></div>
			</div>
			
			<?php
			}
			?>
			
			<input type="hidden" id="maxvaluecount" value="<?php echo $count; ?>">

		</div><!-- PUBLICATIONS -->
		<?php
			$count++;
		}
		?>

	</div>

	<div id="loading" class="dnone" align="center">
		<img src="images/loading.gif" /> Carregando...
	</div>


</div><!-- MURAL -->



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

$('#postmessagearea').trumbowyg({
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


<?php if($view_pub || $IDGLOBAL == $view_sobre['id']){ ?>
function publicar_post(){
	var postmessagearea = document.getElementById("postmessagearea");
	if(postmessagearea.value == "Escreva alguma coisa..." || postmessagearea.value == ""){
		postmessagearea.style.border = "1px solid #C94A4A";
	}
	else{
		document.getElementById("publicpostbt").innerHTML = "Publicando..."
		document.getElementById("form_publicacao_post").submit();
	}

}
<?php 
}
else{
?>
function mostrar_erro(){
	var postmessagearea = document.getElementById("postmessagearea");
	postmessagearea.style.border = "1px solid #C94A4A";
	document.getElementById("erronaoamigomural").style.display = "block";
}

<?php	
} 
?>


<?php if($IDGLOBAL == $view_sobre['id']){ ?>	
function deletar_post(id){
	var bol = confirm("Tem certeza que deseja excluir essa publicacao?");
	if(bol)
		document.getElementById("slave_delete_"+id+"").click();
}
<?php } ?>

function deletar_comment(id){
	var bol = confirm("Tem certeza que deseja excluir esse comentario?");
	if(bol)
		document.getElementById("slave_delete_comment_"+id+"").click();
}

$(document).ready(function(){

	$("#mural .publications .input_button.comment").live("click", function(){
		var x = $(this).attr("rel");
		var q = $(this).attr("rev");
		if(q == "0"){
			$("#pub_textarea_"+x+"").show("fast");
			$("#pub_button_"+x+"").show("fast");
			$(this).attr("rev", "1");
		}
		else{
			$("#pub_textarea_"+x+"").hide("fast");
			$("#pub_button_"+x+"").hide("fast");
			$(this).attr("rev", "0");
		}
	
	});

	$(".publications .envbtcomment").live("click", function(){
		var rel = $(this).attr("rel");
		if($("#pub_textarea_"+rel+"").val() == "" || $("#pub_textarea_"+rel+"").val() == "Escreva um comentario..."){
			$("#pub_textarea_"+rel+"").css("border", "1px solid #C94A4A");
		}
		else{
			$("#form_comment_"+rel+"").submit();
		}
	});

	$(".publications .likebutton").live("click", function(){
		var qtd = $(this).attr("rev");
		var x = $(this).attr("rel");
		qtd = parseInt(qtd)+1;
		qtd = qtd.toString();
		// $("#numlike_"+x+"").html("("+qtd+")");
		var sth = $(this);
		

		$.ajax({
			method:"get",
			url:"<?php echo System::getBase(); ?>app/models/ajaxModel.php",
			data:"tipo=curtir&id_pub="+x+"&qtd="+qtd,
			success: function(filtrar){
				sth.attr("rev", qtd);
			}
					
		});
	});


	var carregarmais = <?php echo (count($view_postagens) >= 5) ? 'true' : 'false'; ?>;
	var quantidade = <?php echo count($view_postagens); ?>;

	var scroller = function(){
		var elem = $(this);
		if(elem.scrollTop() + elem.height() == $(document).height()){

			elem.unbind("scroll");
			
			quantidade = parseInt(quantidade);
			if(carregarmais == true){

				$.ajax({
					method:"get",
					url:"<?php echo System::getBase(); ?>app/models/ajaxModel.php",
					data:"tipo=postagens&qtd="+quantidade+"&sobreid=<?php echo $view_sobre['id']; ?>&sobrenome=<?php echo $view_sobre['nome']; ?>&sobrenomeurl=<?php echo $view_sobre['nome_url']; ?>&base=<?php echo System::getBase(); ?>",
					beforeSend: function(){			
						$("#loading").show("fast");
					},
					complete: function(){
						$("#loading").hide("fast");
					},
					success: function(filtrar){
						quantidade += 5;
						if($(".publications").length < quantidade)
							carregarmais = false;
						$("#thepublications").append(filtrar);
						$(window).scroll(scroller);

					}
							
				});

			}

			return false;
		}	
	}

	$(window).scroll(scroller);
	


});

</script>

