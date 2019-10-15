<?php 
$codigoErro = "404";
$nomeErro = "Not Found";
?>
<div class="container-fluid">

<div class="text-center">
  <div class="error mx-auto" data-text=<?php echo $codigoErro ?>><?php echo $codigoErro ?></div>
  <p class="lead text-gray-800 mb-5"><?php echo $nomeErro ?></p>
  <p class="text-gray-500 mb-0">Parece que você se deparou com um erro...</p>
  <a href="index.php">&larr; Voltar para o início</a>
</div>

</div>