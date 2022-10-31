CREATE DATABASE IF NOT EXISTS hp;

USE hp;

ALTER TABLE `user`
ADD nome VARCHAR (50) NOT NULL,
ADD apelido VARCHAR (50) NOT NULL,
ADD cargo ENUM('cliente','limpezas','restauração','admin') NOT NULL,
ADD nif INT(9) NOT NULL,
ADD telefone INT(9);

CREATE TABLE IF NOT EXISTS quartos(
id INT(4) NOT NULL PRIMARY KEY,
lotacao INT NOT NULL,
nrCamas INT NOT NULL,
nrCasasBanho INT NOT NULL,
acessoDef ENUM('sim','não') NOT NULL,
valorNoite DECIMAL (6,2) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS mesas(
id INT NOT NULL PRIMARY KEY,
lotacao INT NOT NULL,
forma ENUM('redonda','quadrada','retângular') NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS mesasMarcacoes(
idCliente INT NOT NULL PRIMARY KEY,
idMesa INT NOT NULL,
nrPessoas INT NOT NULL,
data datetime NOT NULL,
estado ENUM('entregue','não entregue') NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS estadias(
id INT AUTO_INCREMENT PRIMARY KEY,
dataPedido date NOT NULL,
idCliente INT NOT NULL,
idQuarto INT NOT NULL,
dataInicio DATE NOT NULL,
dataTermo DATE NOT NULL,
duracao INT NOT NULL,
lotacao INT NOT NULL,
valorTotal DECIMAL (7,2) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS checkIns(
idEstadia INT NOT NULL,
estado ENUM('pago','não pago') NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS limpezas(
idColaborador INT NOT NULL,
idCliente INT NOT NULL,
idQuarto INT NOT NULL,
data DATETIME NOT NULL,
estado ENUM('limpo','por limpar') NOT NULL
)ENGINE = InnoDB;


ALTER TABLE `mesasMarcacoes`
  ADD CONSTRAINT `fk_mesasMarcacoes_idColaborador` FOREIGN KEY (`idColaborador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_mesasMarcacoes_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_mesasMarcacoes_idQuarto` FOREIGN KEY (`idQuarto`) REFERENCES `quartos` (`id`);
COMMIT;

ALTER TABLE `estadias`
  ADD CONSTRAINT `fk_estadias_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_estadias_idQuarto` FOREIGN KEY (`idQuarto`) REFERENCES `quartos` (`id`);
COMMIT;

ALTER TABLE `checkIns`
  ADD CONSTRAINT `fk_checkIns_idEstadia` FOREIGN KEY (`idEstadia`) REFERENCES `estadias` (`id`);
COMMIT;

ALTER TABLE `limpezas`
  ADD CONSTRAINT `fk_limpezas_idColaborador` FOREIGN KEY (`idColaborador`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_limpezas_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_limpezas_idQuarto` FOREIGN KEY (`idQuarto`) REFERENCES `quartos` (`id`);
COMMIT;















