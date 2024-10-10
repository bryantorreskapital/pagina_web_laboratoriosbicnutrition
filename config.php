<?php
ini_set('display_errors', '1');
ini_set('max_input_vars', 2000);

define('FS_DB_TYPE', 'MYSQL'); /// MYSQL o POSTGRESQL
define('FS_DB_HOST', '66.206.19.82');
define('FS_DB_PORT', '3306'); /// MYSQL -> 3306, POSTGRESQL -> 5432
define('FS_DB_NAME', 'melocotonsk');
define('FS_DB_USER', 'Gabriel'); /// MYSQL -> root, POSTGRESQL -> postgres
define('FS_DB_PASS', '6Qw9xuPnJrWkkdxg');

/*
 * Habilita el modo desarrollo, para pruebas.
 * Este modo permite al programador utilizar el inspesionador de elementos entre otras herramientas,
 */
define('FS_DESARROLLO', 'NO');

/*
 * ConfiguraciÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â‚¬Å¾Ã‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â³n de memcache.
 * Host: la ip del servidor donde estÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â‚¬Å¾Ã‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¡ memcached.
 * port: el puerto en el que se ejecuta memcached.
 * prefix: prefijo para las claves, por si tienes varias instancias de
 * Sistemas conectadas al mismo servidor memcache.
 */
/*
 * Un directorio de nombre aleatorio para mejorar la seguridad del directorio temporal.
 */
define('FS_TMP_NAME', 'CycowghORMX0UEnfuN40/');
define('FS_CACHE_HOST', 'localhost');
define('FS_CACHE_PORT', '11211');
define('FS_CACHE_PREFIX', 'mS2Ca7jA_');
define('FS_WEB', 'localhost/melocoton2/');
define('FS_TRAMACO', '');
define('FS_CONTRATO_TRAMACO', 4624);
define('FS_PARROQUIA_REMI', 318);
define('FS_LOCALIDAD', 15425);

/// caducidad (en segundos) de todas las cookies
define('FS_COOKIES_EXPIRE', 7776000);

/// el nÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â‚¬Å¾Ã‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âºmero de elementos a mostrar en pantalla
define('FS_ITEM_LIMIT', 5);
define('FS_HOMEPAGE', 'inicio');
define('FS_PATH', '');
define('FS_NF0', 2);
define('FS_NF1', '.');
define('FS_NF2', '');
define('FS_NF0_ART', 5);
define('FS_POS_DIVISA', 'left');
define('FS_REF_ENVIO', '');
define('FS_PORCENTAJE_ENVIO', '');