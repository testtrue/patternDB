DROP DATABASE IF EXISTS patterndb;
CREATE DATABASE patterndb
  CHARACTER SET = 'utf8'
  COLLATE = 'utf8_general_ci';

CREATE TABLE IF NOT EXISTS patterndb.patterntype (
  id_patterntype INT UNSIGNED          AUTO_INCREMENT PRIMARY KEY,
  name           VARCHAR(255) NOT NULL DEFAULT ''
)
  ENGINE = InnoDB, AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS patterndb.picture (
  id_picture INT UNSIGNED          AUTO_INCREMENT PRIMARY KEY,
  filename   VARCHAR(255) NOT NULL DEFAULT '',
  caption    VARCHAR(255) NOT NULL DEFAULT ''
)
  ENGINE = InnoDB, AUTO_INCREMENT = 1;

CREATE TABLE IF NOT EXISTS patterndb.pattern (
  id_pattern       INT UNSIGNED          AUTO_INCREMENT PRIMARY KEY,
  name             VARCHAR(255) NOT NULL DEFAULT '',
  short_description TEXT         NOT NULL,
  long_description  TEXT         NOT NULL,
  code             TEXT         NOT NULL,
  id_patterntype   INT UNSIGNED NOT NULL DEFAULT 0,
  id_picture       INT UNSIGNED NOT NULL DEFAULT 0,
  CONSTRAINT `fk_pattern_patterntype`
  FOREIGN KEY (id_patterntype) REFERENCES patterntype (id_patterntype)
    ON DELETE CASCADE,
  CONSTRAINT `fk_pattern_picture`
  FOREIGN KEY (id_picture) REFERENCES picture (id_picture)
)
  ENGINE = InnoDB, AUTO_INCREMENT = 1;
