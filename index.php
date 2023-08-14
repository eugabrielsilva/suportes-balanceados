<?php

/**
 * Realiza a validação da sequência de colchetes.
 * @param string $string String a ser validada.
 * @return bool Retorna se a sequência é válida ou não.
 */
function validar(string $string): bool
{
    // Remove todos os caracteres que não sejam colchetes
    $string = preg_replace('/[^(){}\[\]]/', '', $string);

    // Valida cada caso de par de colchetes encontrado
    while (preg_match('/(\(\)|\{\}|\[\])/', $string)) {
        $string = preg_replace('/(\(\)|\{\}|\[\])/', '', $string);
    }

    // Retorna o resultado final
    return empty($string);
}

// Obtém valor enviado pelo formulário e passa pela função
if (!empty($_GET['string'])) {
    $result = validar($_GET['string']);
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100 w-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suportes Balanceados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
</head>

<body class="bg-dark h-100 w-100 d-flex align-items-center justify-content-center">

    <div class="container" style="max-width: 500px;">
        <h3 class="text-white text-center mb-4">Suportes Balanceados</h3>

        <form method="get">
            <div class="d-flex align-items-center">
                <input autofocus value="<?= $_GET['string'] ?? '' ?>" class="form-control me-3" type="text" name="string" placeholder="Digite uma sequência de colchetes">
                <button class="btn btn-primary">Validar</button>
            </div>
        </form>

        <?php if (isset($result)) : ?>
            <?php if ($result) : ?>
                <div class="alert alert-success mt-3">
                    A sequência é válida!
                </div>
            <?php else : ?>
                <div class="alert alert-danger mt-3">
                    A sequência é inválida!
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a class="text-secondary" href="https://github.com/eugabrielsilva" target="_blank">Visite meu GitHub</a>
        </div>
    </div>

</body>

</html>