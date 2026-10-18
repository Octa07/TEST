<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/seguridad.php';

$escaped = escapar('<script>alert("x")</script>');
if ($escaped !== '&lt;script&gt;alert(&quot;x&quot;)&lt;/script&gt;') {
    throw new RuntimeException('HTML escaping did not encode unsafe characters.');
}

$token = tokenCsrf();
if (strlen($token) !== 64 || !csrfValido($token) || csrfValido('invalid-token')) {
    throw new RuntimeException('CSRF token generation or validation failed.');
}

$_SESSION['usuario'] = ['id' => 1, 'rol' => 'admin'];
if (!esAdministrador()) {
    throw new RuntimeException('An administrator session was not recognized.');
}

$_SESSION['usuario']['rol'] = 'cliente';
if (esAdministrador()) {
    throw new RuntimeException('A client session was incorrectly recognized as an administrator.');
}

echo "Security helper tests passed.\n";
