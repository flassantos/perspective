<div id="footer_divisor"></div>

<div id="footer">
	<div class="sub_content">
		<div class="line"></div>
		<br>

		Perspective © 2020-<?php echo date("Y"); ?>. Todos os direitos reservados.

		<a class="linksx pr mhl" id="iraotopo">Ir ao topo</a><span class="pr mhl">|</span>
		<a class="linksx pr mhl" data-fancybox-href="#termosmodal" data-fancybox-title="Termos">Termos</a><span class="pr mhl">|</span>
		<a class="linksx pr mhl" data-fancybox-href="#desenvmodal" data-fancybox-title="Desenvolvedores">Desenvolvedores</a><span class="pr mhl">|</span>
		<a class="linksx pr mhl" data-fancybox-href="#sobremodal" data-fancybox-title="Sobre">Sobre</a>
	</div>
</div><!-- FOOTER -->

<div class="dnone text" id="termosmodal">
<!-- 
Prometo nunca votar no Bolsolixo.
<br>
<br>
 -->
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non magna interdum, convallis arcu id, faucibus erat. Etiam lacinia euismod quam, quis rutrum tellus finibus efficitur. Maecenas tincidunt magna purus, ac mattis nisi scelerisque nec. Fusce consectetur tellus accumsan ligula dapibus dictum. Integer vestibulum lacus orci, eu imperdiet purus venenatis at. Curabitur lacinia at erat in ullamcorper. Aenean et risus ex. Phasellus condimentum vel quam a mollis. Praesent nec elementum odio. Suspendisse vehicula semper mauris. Proin efficitur massa elit, in mollis orci vestibulum vel. Etiam in metus quis leo rhoncus iaculis. Sed a tortor vel est pellentesque lacinia ut id justo.
<br><br>
Aliquam malesuada sollicitudin libero, at iaculis velit. Morbi ultrices arcu a lectus pretium accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras id massa eget mauris tincidunt sodales. Duis auctor tellus at blandit ultricies. Fusce eget est accumsan, faucibus purus eu, molestie sem. Nam congue erat vel nibh pretium, vel faucibus nisi elementum. Aenean eu porta tellus, at egestas nulla.
<br><br>
Curabitur maximus justo vitae mauris aliquam, eget bibendum leo commodo. Donec orci nisl, tristique eu ligula sed, tincidunt dignissim ex. Vestibulum vitae massa neque. Nunc imperdiet dui sit amet efficitur mattis. Praesent imperdiet bibendum accumsan. Donec gravida tellus at augue volutpat rutrum. Morbi iaculis ante vel rhoncus sagittis. Aliquam sit amet nunc laoreet, sagittis nunc sit amet, accumsan neque. Pellentesque tempus erat ut arcu auctor, eget iaculis diam placerat. Integer non pharetra sapien. Integer mattis risus ut dui feugiat iaculis.
<br><br>
In ullamcorper convallis feugiat. Proin consectetur, ligula sed sodales ultricies, nibh nisi auctor felis, ac dictum ex ligula vitae ligula. Donec tristique condimentum lorem. Aliquam leo diam, pellentesque sit amet arcu et, auctor viverra elit. Duis efficitur erat nibh, non tincidunt tellus accumsan sed. Pellentesque scelerisque fermentum justo volutpat fringilla. Proin blandit fringilla neque a tristique. Aenean non lacus vitae mauris efficitur dictum.
<br><br>
Mauris viverra efficitur egestas. Integer rhoncus, tortor eget tristique sodales, ligula nunc pharetra lacus, ac dapibus nibh nunc vitae nunc. Nunc velit erat, lacinia id iaculis non, euismod vitae ante. Morbi tempus massa vitae sapien scelerisque, vitae mollis libero varius. Etiam molestie feugiat eros. Sed mauris metus, molestie ut odio ut, suscipit iaculis nulla. Sed lacinia ex in nibh blandit efficitur. Aenean fringilla nec neque et porta. Integer gravida mauris velit, nec congue lectus pellentesque ut.
</div>

<div class="dnone" id="desenvmodal">
• Marcos V. Treviso
<br>
• Flávia S. Santos
</div>

<div class="dnone" id="sobremodal">

<center>
<h4 class="sub_title">Perspective - Social Network</h4>
<div class="lineo"></div>
<br>
<div class="mh"></div>
Universidade de São Paulo
<div class="mh"></div>
2021.
<div class="mh"></div>
</center>
</div>



<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="scripts/fancyapps/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="scripts/fancyapps/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/fancyapps/source/jquery.fancybox.js?v=2.1.4"></script>

<!-- Optionally add helpers - button, thumbnail and/or media
<link rel="stylesheet" href="scripts/fancyapps/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/fancyapps/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="scripts/fancyapps/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
 -->
 
<link rel="stylesheet" href="scripts/fancyapps/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/fancyapps/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>





<script type="text/javascript">

$(document).ready(function(e) {
	
	$(".fancyapps").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		helpers	: {
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});

	$("#footer .linksx").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		maxWidth: 640,
		maxHeight: 480
	});
	
	$("#iraotopo").click(function(){
		$("html, body").animate({ scrollTop: 0 }, "fast");
 		 return false;
	});

});
</script>
