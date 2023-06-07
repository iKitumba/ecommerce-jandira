<?php
session_start();

// Verifica se a variável de sessão do carrinho de compras existe e cria uma, se necessário
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Função para adicionar um item ao carrinho
function adicionarAoCarrinho($produto, $quantidade, $preco) {
    // Verifica se o produto já existe no carrinho
    if (isset($_SESSION['carrinho'][$produto["id_produto"]])) {
        if($produto["quantidade_produto"] > $quantidade){
            $_SESSION['carrinho'][$produto["id_produto"]]['quantidade_produto'] += $quantidade;
        }
    } else {
        $_SESSION['carrinho'][$produto["id_produto"]] = array(
            'quantidade_produto' => $quantidade,
            'preco_produto' => $preco,
            'produto' => $produto,
        );
    }
}

// Função para remover um item do carrinho
function removerDoCarrinho($id_produto) {
    if (isset($_SESSION['carrinho'][$id_produto])) {
        unset($_SESSION['carrinho'][$id_produto]);
    }
}

// Função para atualizar a quantidade de um item no carrinho
function atualizarQuantidade($produto, $quantidade) {
    if (isset($_SESSION['carrinho'][$produto["id_produto"]])) {
        if($produto["quantidade_produto"] > $quantidade){
            $_SESSION['carrinho'][$produto["id_produto"]]['quantidade'] = $quantidade;
        }
    }
}

// Função para calcular o total do carrinho
function calcularTotal() {
    $total = 0;
    if(sizeof($_SESSION["carrinho"])){
        foreach ($_SESSION['carrinho'] as $produto => $item) {
            $total += $item['quantidade_produto'] * $item['preco_produto'];
        }
    }
    
    return $total;
}

// Exemplo de uso:

// Adicionar itens ao carrinho
// $p1 = array("id_produto" => 1, "nome_produto"=> "Reslógio", "quantidade_produto"=> 3);
// $p2 = array("id_produto" => 2, "nome_produto"=> "Qualquer", "quantidade_produto"=> 1);
// adicionarAoCarrinho($p1, 2, 10.99);
// adicionarAoCarrinho($p2, 1, 5.99);

// // Remover um item do carrinho
// removerDoCarrinho($p2);

// // Atualizar a quantidade de um item no carrinho
// atualizarQuantidade($p1, 3);

// // Calcular o total do carrinho
// $total = calcularTotal();

// // Exibir os itens do carrinho
// foreach ($_SESSION['carrinho'] as $produto => $item) {
//     echo "Produto: $produto<br>";
//     echo "Quantidade: {$item['quantidade_produto']}<br>";
//     echo "Preço unitário: {$item['preco_produto']}<br>";
//     echo "<br>";
// }

// echo "Total do carrinho: $total";
?>
