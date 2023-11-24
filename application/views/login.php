<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <title>Login</title>
</head>

<body>
    <section id="main">
        <img id="imgLogin" src="assets/img/imgLogin.png">
        <?php
        #Add the CSRF
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $attributes = array('id' => 'forms');
        $data = array(
            'name' => 'button',
            'id' => 'button',
            'type' => 'submit',
            'content' => 'Enviar',
        );
        echo form_open('', $attributes);
        ?>
        <h1>Login</h1>
        <?php
        echo form_label('Email', 'email');
        echo form_input(['type' => 'email', 'name' => 'email','value' => !!$this->input->post('email') ? $this->input->post('email') : '']);
        ?>
        <span class="msg">
            <?php echo isset($error_email) ? "Insira um e-mail válido!" : '';?>
        </span>
        <?php
        echo form_label('Password', 'senha');
        echo form_input(['type' => 'password', 'name' => 'senha']);
        ?>
        <span class="msg">
            <?php echo isset($error_senha) ? "Insira uma senha mínima de 8 caracteres." : ''; ?>
        </span>
        <?php
        echo form_button($data);
        echo form_close()
            ?>
    </section>
</body>
</html>