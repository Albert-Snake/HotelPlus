-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2023 às 13:10
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '5', 1671102285),
('cliente', '6', 1672669058),
('colabLimpeza', '7', 1672668835),
('colabLimpeza', '8', 1672669042);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1667818844, 1667818844),
('cliente', 1, NULL, NULL, NULL, 1667818844, 1667818844),
('colabCozinha', 1, NULL, NULL, NULL, 1667818844, 1667818844),
('colabLimpeza', 1, NULL, NULL, NULL, 1667818844, 1667818844),
('crudAll', 2, 'CRUD para o Administrador', NULL, NULL, 1667818844, 1667818844),
('crudCliente', 2, 'Permissões de CLiente', NULL, NULL, 1667818844, 1667818844),
('crudCozinha', 2, 'CRUD na Cozinha', NULL, NULL, 1667818844, 1667818844),
('crudLimpeza', 2, 'CRUD de Limpeza', NULL, NULL, 1667818844, 1667818844);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'crudAll'),
('admin', 'crudCliente'),
('admin', 'crudCozinha'),
('admin', 'crudLimpeza'),
('cliente', 'crudCliente'),
('colabCozinha', 'crudCliente'),
('colabCozinha', 'crudCozinha'),
('colabLimpeza', 'crudCliente'),
('colabLimpeza', 'crudLimpeza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1667818713),
('m130524_201442_init', 1667818715),
('m140506_102106_rbac_init', 1667818764),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1667818764),
('m180523_151638_rbac_updates_indexes_without_prefix', 1667818764),
('m190124_110200_add_verification_token_column_to_user_table', 1667818715),
('m200409_110543_rbac_update_mssql_trigger', 1667818764),
('m221107_105932_init_rbac', 1667818844);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` enum('cliente','limpezas','restauração','admin') COLLATE utf8_unicode_ci NOT NULL,
  `nif` int(9) NOT NULL,
  `telefone` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `nome`, `apelido`, `cargo`, `nif`, `telefone`) VALUES
(5, 'Alberto', 'TlfjVU1AobZS0P7CGGTMcJcjvsB7RORF', '$2y$13$DShI1vj/.8284359kTUtEO97pvGPKIl6OxQ1AzzR48aV0gFIBbER2', NULL, 'alberto@mail.com', 10, 0, 0, NULL, 'Alberto', 'Correia', 'admin', 241335019, 937564560),
(6, 'TESTE', 'sG3IMdzLX8l84t8Fxcbzvxdl92wsrBSz', '$2y$13$udXpJGwq5Uk.6urji.tslu/LoM327lBwVbaWmsJ9qxtl2fDw6Dzhi', NULL, 'teste@mail.com', 10, 0, 0, NULL, 'teste', 'teste', 'cliente', 147258366, 321456987),
(7, 'SimaoV', 's7wf7XcCRpsbqM6wO7NrWsvXBeyf2mgq', '$2y$13$q9aANNbGb117mTVK2zhVVubAlhU4ToNVRNm3EMI.EmKZIec52hh1O', NULL, 'simao@mail.com', 10, 0, 0, NULL, 'Simao', 'Ventura', 'limpezas', 147852336, 321654789),
(8, 'RafaelG', 'VDTUH63pt6vrfyMY62fSmii5Fgy1Wm5_', '$2y$13$0zBgA94XrjkCV/S3JPwUpOftX5kXOePcrufoG12/3r.6V.2Dx.LiK', NULL, 'rafael@mail.com', 10, 0, 0, NULL, 'Rafael', 'Guerra', 'limpezas', 987456123, 147852369);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`),
  ADD KEY `auth_assignment_ibfk_1` (`item_name`);

--
-- Índices para tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Índices para tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Índices para tabela `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Índices para tabela `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
