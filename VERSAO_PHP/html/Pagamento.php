<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criatil</title>
    <link rel="stylesheet" href="../css/Pagamento.css">
</head>
<body>
    <div class="main-container">
        <div class="secaoPagamento">
            <h2>Selecione um método de pagamento</h2>
            <div class="opcoesPagamento">
                
                <div class="option" id="credito" onclick="selectPayment('Credito')">
                    <img src="../imagens/pagamento/Cartão-Visa-Gold.webp" alt="Crédito">
                    <p>Crédito</p>
                </div>
                <div class="option" id="debito" onclick="selectPayment('Debito')">
                    <img src="../imagens/pagamento/debito.png" alt="Débito">
                    <p>Débito</p>
                </div>
                <div class="option" id="boleto" onclick="selectPayment('Boleto')">
                    <img src="../imagens/pagamento/boleto.png" alt="Boleto">
                    <p>Boleto</p>
                </div>
                <div class="option" id="pix" onclick="selectPayment('Pix')">
                    <img src="../imagens/pagamento/logo-pix.png" alt="Pix">
                    <p>Pix</p>
                </div>
            </div>
        </div>
        <div class="sumario">
            <h3>Resumo</h3>
            <p>Subtotal:</p>
            <p>Desconto:</p>
            <p>Total:</p>
            <p id="pagamentoSelecionado">Pagamento:</p>
            <button id="back-button">Voltar</button>
            <button id="continue-button">Continuar para o pagamento</button>
        </div>
    </div>
    <script src="../js/Pagamento.js"></script>
</body>
</html>