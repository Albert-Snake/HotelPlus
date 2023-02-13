CREATE TABLE IF NOT EXISTS cardapio(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
categoria ENUM('Carne','Peixe', 'Bebidas Lisas', 'Bebidas Gasosas', 'Bebidas Alcólicas', 'Sobremesas') NOT NULL,
nome VARCHAR(50) NOT NULL,
descricao VARCHAR(100) NOT NULL,
valor DECIMAL(33,2) NOT NULL
)ENGINE = InnoDB;