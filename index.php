<?php
// Configurações do banco de dados
$host = 'localhost';   // Endereço do servidor MySQL
$user = 'joelma';        // Seu usuário MySQL
$password = 'SenhaForte123@';        // Sua senha MySQL
$database = 'site';    // Nome do banco de dados

// Conectando ao banco de dados MySQL
$conn = new mysqli($host, $user, $password, $database);

// Verificar se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para buscar os dados da tabela
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Verificar se há resultados
if ($result->num_rows > 0) {
    $usuarios = [];
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
} else {
    echo json_encode([]);
}

// Fechar a conexão com o banco de dados
$conn->close();
?>