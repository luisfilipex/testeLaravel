<!DOCTYPE html>
<html>
<head>
    <title>Veículo Atualizado</title>
</head>
<body>
    <h1>Veículo Atualizado</h1>
    <p>O veículo {{ $veiculo->nome }} foi atualizado com sucesso.</p>
    <p>Modelo: {{ $veiculo->modelo }}</p>
    <p>Placa: {{ $veiculo->placa }}</p>
    <p>RENAVAM: {{ $veiculo->renavam }}</p>
    <p>Observação: {{ $veiculo->observacao }}</p>
</body>
</html>
