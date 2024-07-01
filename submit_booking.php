<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    // Conectar ao banco de dados (substitua com suas próprias credenciais)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, service, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $service, $message);

    // Executar a declaração
    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fechar conexões
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitação inválido";
}
?>
