<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    $to = "geson.pires@gmail.com"; // Substitua com seu endereço de e-mail
    $subject = "Novo Agendamento de Consulta";
    $body = "Nome: $name\nEmail: $email\nTelefone: $phone\nServiço: $service\nMensagem: $message";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo "E-mail enviado com sucesso.";
    } else {
        echo "Falha no envio do e-mail.";
    }
} else {
    echo "Método de solicitação inválido";
}
?>
