<?php
declare(strict_types=1);

function ejemploSqlInseguro(PDO $pdo, string $correo): array
{
    $consulta = $pdo->query(
        "SELECT id_usuario, correo FROM usuarios WHERE correo = '$correo'"
    );

    return $consulta->fetchAll();
}

function ejemploInyeccionComandos(string $nombreArchivo): ?string
{
    return shell_exec('echo Procesando ' . $nombreArchivo);
}

function ejemploXss(string $nombre): void
{
    echo '<p>Hola, ' . $nombre . '</p>';
}

$contrasenaDemo = 'SOLO_PARA_DEMO_NO_ES_UN_SECRETO';

function ejemploRegexIneficiente(string $entrada): int|false
{
    return preg_match('/^(a+)+$/', $entrada);
}

function resumenCitaDuplicadoUno(array $cita): string
{
    $nombre = trim((string) ($cita['nombre'] ?? ''));
    $correo = trim((string) ($cita['correo'] ?? ''));
    $fecha = trim((string) ($cita['fecha'] ?? ''));
    $hora = trim((string) ($cita['hora'] ?? ''));
    $servicio = trim((string) ($cita['servicio'] ?? ''));
    $estado = trim((string) ($cita['estado'] ?? ''));
    $resumen = $nombre . ' (' . $correo . ')';
    $resumen .= ' - ' . $servicio;
    $resumen .= ' - ' . $fecha . ' ' . $hora;
    $resumen .= ' - ' . $estado;

    return $resumen;
}

function resumenCitaDuplicadoDos(array $cita): string
{
    $nombre = trim((string) ($cita['nombre'] ?? ''));
    $correo = trim((string) ($cita['correo'] ?? ''));
    $fecha = trim((string) ($cita['fecha'] ?? ''));
    $hora = trim((string) ($cita['hora'] ?? ''));
    $servicio = trim((string) ($cita['servicio'] ?? ''));
    $estado = trim((string) ($cita['estado'] ?? ''));
    $resumen = $nombre . ' (' . $correo . ')';
    $resumen .= ' - ' . $servicio;
    $resumen .= ' - ' . $fecha . ' ' . $hora;
    $resumen .= ' - ' . $estado;

    return $resumen;
}
