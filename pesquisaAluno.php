<?php
function procurarAlunoPorNome($alunos, $nomePesquisa)
{
    foreach ($alunos as $matricula => $dados) {
        if (strtolower($dados['nome']) == strtolower($nomePesquisa)) {
            return [
                'matricula' => $matricula,
                'nome' => $dados['nome'],
                'media' => $dados['media'],
            ];
        }
    }

    return null;
}

$alunos = [
    $_POST['matricula1'] => [
        'nome' => $_POST['nome1'],
        'media' => $_POST['media1'],
    ],
    $_POST['matricula2'] => [
        'nome' => $_POST['nome2'],
        'media' => $_POST['media2'],
    ],
    $_POST['matricula3'] => [
        'nome' => $_POST['nome3'],
        'media' => $_POST['media3'],
    ],
];

$nomePesquisa = trim($_POST['nomePesquisa']);
$alunoEncontrado = procurarAlunoPorNome($alunos, $nomePesquisa);
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesquisa de Aluno</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main class="cartao tabela">
        <h1>Resultado da pesquisa</h1>

        <?php if ($alunoEncontrado): ?>
            <table>
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Média final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo number_format($alunoEncontrado['matricula'], 0, ',', '.'); ?></td>
                        <td><?php echo $alunoEncontrado['nome']; ?></td>
                        <td><?php echo number_format($alunoEncontrado['media'], 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem"><strong>Aluno não encontrado.</strong></p>
        <?php endif; ?>

        <a href="index.html">Voltar ao formulário</a>
    </main>
</body>

</html>
