<div class="form-group">
    <label for="nome">Nome do Produto</label>
    <input type="text" class="form-control" name="nome" dusk="nome" value="{{ old('nome', isset($produto) ? $produto->nome : null) }}" required>
</div>

<div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" step="0.01" class="form-control" dusk="preco" name="preco" value="{{ old('preco', isset($produto) ? $produto->preco : null) }}" required>
</div>
<br>