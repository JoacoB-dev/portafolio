-- Tabla de mensajes del formulario de contacto (MySQL 5.x / MariaDB)
CREATE TABLE IF NOT EXISTS mensajes (
    id         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre     VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    mensaje    TEXT         NOT NULL,
    ip         VARCHAR(45)  NULL,
    creado_en  DATETIME     NOT NULL,
    PRIMARY KEY (id),
    KEY idx_creado_en (creado_en)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
