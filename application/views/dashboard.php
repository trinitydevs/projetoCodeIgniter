<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Bem-vindo!</title>
</head>

<body>
    <header id="topo">
        <?php echo form_open('dashboard', array('id' => 'sair')); ?>
        <button name="sair" type="submit" id="btnSair">
            <img src="assets/img/sair.png" alt="">
            Sair</button>
        <?php echo form_close(); ?>
    </header>
    <div id="alinhar">
        <div id="usuario">
            <div id="boxFoto">
                <div id="fotoUser">
                    <?php $attributes = array('id' => 'foto_usuario', 'action' => ''); ?>
                    <?php form_open_multipart('dashboard/updatePhoto', $attributes); ?>
                    <?php echo $this->session->foto_usuario; ?>
                </div>
                <div id="alinhaBtn">
                    <input type="file" name="foto_usuario" id="btnFoto">
                    <button type="submit" id="upload">Salvar</button>
                </div>
                <?php form_close(); ?>
            </div>
            <h2 id="nomeUser">
                <?php echo $nome[0]->nome; ?>
            </h2>
        </div>
    </div>
    <?php
    echo '<script>
    var url = "' . site_url("users/logout") . '";
    </script>'
    ?>
    <script src="assets/logout.js"><script type="text/javascript"></script>
</body>
</html>