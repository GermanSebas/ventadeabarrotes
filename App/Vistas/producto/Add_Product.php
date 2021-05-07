<h1>Agregar producto</h1>
<form method="post" action="index.php?AgregarProducto">
    <label class="form-label">Producto: </label>
    <input type="text" class="form-control" name="producto" placeholder="Nombre del Producto"><br>
    <label class="form-label">Descripción: </label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion del producto"><br>
    <label class="form-label">Precio: </label>
    <input type="text" class="form-control" name="precio" placeholder="Precio"><br>
    <label class="form-label">Marca: </label>
    <input type="text" class="form-control" name="marca" placeholder="Marca"><br>
    <label class="form-label">Unidades disponibles: </label>
    <input type="text" class="form-control" name="stock" placeholder="Stock"><br>
    <label>Fecha de vencimiento: </label>
    <input type="date" name="vencimiento" placeholder="Fecha de vencimiento"><br>
    <label class="form-label">Tipo Producto: </label>
    <select name="tipo" class="form-control">
        <!-- TODO: Generar de manera independiente de acuerdo a la base de datos -->
        <option value="Bebidas">Bebidas</option>
        <option value="Conservas">Conservas</option>
        <option value="Snaks">Snaks</option>
        <option value="Menestras">Menestras</option>
        <option value="Carnes">Carnes</option>
        <option value="Harinas">Harinas</option>
        <option value="Higiene">Higiene</option>
    </select><br>
    <input type="submit" class="form-control btn btn-primary" name="submit" value="Verificar y añadir">
</form>
<?php
if (isset($_POST["submit"])) {
    $prod = new \App\Clases\Producto();
    $prod->agregarProducto($_POST["tipo"], $_POST["stock"], $_POST["vencimiento"], $_POST["producto"], $_POST["descripcion"], $_POST["precio"], $_POST["marca"]);
    header("Location: index.php?Tienda_");
}
?>