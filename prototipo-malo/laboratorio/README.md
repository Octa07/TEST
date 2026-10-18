# Laboratorio de hallazgos intencionales

Este directorio contiene ejemplos deliberadamente inseguros para una práctica de análisis estático. No forma parte de la aplicación SAGER: ningún archivo de aquí se incluye ni se llama desde sus controladores.

## Reglas de seguridad

- No despliegues este directorio en un servidor público ni ejecutes sus funciones.
- Los valores de credenciales son marcadores ficticios, no son credenciales válidas.
- No reemplaces los marcadores por secretos, datos reales o credenciales de servicios.
- Sube este laboratorio solo a la rama/repo desechable autorizado para la práctica.
- Guarda el informe **Antes**, luego elimina o corrige los ejemplos vulnerables en la rama que entregarás.

## Casos que se intentan detectar

- Consulta SQL construida por concatenación.
- Inyección de comandos del sistema operativo.
- Salida HTML sin codificar (XSS).
- Contraseña de demostración codificada.
- Expresión regular con riesgo de backtracking excesivo.
- Dependencia Composer obsoleta (`symfony/http-foundation` 2.0.4) para el análisis de Snyk Open Source; el `composer.lock` conserva esa versión vulnerable.
- Código duplicado y ausencia de pruebas/cobertura para los ejemplos.

Los analizadores pueden no detectar todos los casos, o pueden clasificarlos de otra manera. Registra solo los resultados que aparezcan realmente en SonarCloud, Snyk y DeepSource.

Para el prototipo bueno, no copies la dependencia vulnerable. La aplicación no usa Symfony, así que conserva solo `ext-pdo` en `composer.json` y regenera `composer.lock`; si más adelante agregas Symfony, selecciona una versión mantenida y ejecuta `composer audit` antes de subirla.
