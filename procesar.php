<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

require_once "conexion.php";

$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$plato = trim($_POST["plato"] ?? "");
$cantidad = filter_input(INPUT_POST, "cantidad", FILTER_VALIDATE_INT);
$detalle = trim($_POST["detalle"] ?? "");

$precios = [
    "Ensalada Verde" => 25,
    "Bowl Vegano" => 30,
    "Plato Natural" => 28,
    "Veggie Burger" => 32,
    "Sopa de Verduras" => 20,
    "Postre Natural" => 18
];

if (
    $nombre === "" ||
    $telefono === "" ||
    !array_key_exists($plato, $precios) ||
    $cantidad === false ||
    $cantidad === null ||
    $cantidad < 1 ||
    $cantidad > 50
) {
    header("Location: index.php?estado=error#pedido");
    exit;
}

$precioUnitario = $precios[$plato];
$total = $precioUnitario * $cantidad;

try {
    $sql = "INSERT INTO pedidos (nombre, telefono, plato, cantidad, precio_unitario, total, detalle)
            VALUES (:nombre, :telefono, :plato, :cantidad, :precio_unitario, :total, :detalle)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nombre" => $nombre,
        ":telefono" => $telefono,
        ":plato" => $plato,
        ":cantidad" => $cantidad,
        ":precio_unitario" => $precioUnitario,
        ":total" => $total,
        ":detalle" => $detalle
    ]);

    header("Location: index.php?estado=ok#pedido");
    exit;
} catch (PDOException $e) {
    header("Location: index.php?estado=error#pedido");
    exit;
}
?>
