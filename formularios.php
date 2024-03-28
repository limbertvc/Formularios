
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"], 
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulário de Contato</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required> 

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</div>

<?php


class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "phpadmin";
    private $conn;

   
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    
    public function insertData($nome, $sobrenome, $idade, $email, $cpf, $senha, $mensagem)
    {
        $sql = "INSERT INTO sua_tabela (nome, sobrenome, idade, email, cpf, senha, mensagem) VALUES ('$nome', '$sobrenome', '$idade', '$email', '$cpf', '$senha', '$mensagem')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

  
    public function fetchData()
    {
        $sql = "SELECT * FROM sua_tabela";
        $result = $this->conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

   
    public function updateData($id, $nome, $sobrenome, $idade, $email, $cpf, $senha, $mensagem)
    {
        $sql = "UPDATE sua_tabela SET nome='$nome', sobrenome='$sobrenome', idade='$idade', email='$email', cpf='$cpf', senha='$senha', mensagem='$mensagem' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    
    public function deleteData($id)
    {
        $sql = "DELETE FROM sua_tabela WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

   
    public function __destruct()
    {
        $this->conn->close();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['idade']) && !empty($_POST['email']) && !empty($_POST['cpf']) && !empty($_POST['senha']) &&)
}