SET GLOBAL time_zone = '-3:00';

CREATE SCHEMA IF NOT EXISTS agile_engine;

USE agile_engine;

CREATE TABLE IF NOT EXISTS Users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(128) NOT NULL,
  last_name VARCHAR(128),
  birth_day DATE NOT NULL,
  active BOOLEAN NOT NULL DEFAULT 1,
  created_at TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;