SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `hotel_v4` ;
CREATE SCHEMA IF NOT EXISTS `hotel_v4` DEFAULT CHARACTER SET latin1 ;
USE `hotel_v4` ;

-- -----------------------------------------------------
-- Table `hotel_v4`.`nivel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`nivel` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`nivel` (
  `nivelId` INT NOT NULL AUTO_INCREMENT ,
  `nivelNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`nivelId`) ,
  UNIQUE INDEX `id_UNIQUE` (`nivelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`usuario` (
  `usuarioId` INT NOT NULL AUTO_INCREMENT ,
  `nivelId` INT NOT NULL ,
  `usuarioNome` VARCHAR(100) NOT NULL ,
  `usuarioEmail` VARCHAR(100) NOT NULL ,
  `usuarioDataNascimento` DATE NOT NULL ,
  `usuarioSexo` ENUM('f', 'm') NOT NULL ,
  `usuarioDocumentoTipo` ENUM('cpf', 'cnpj', 'passaporte') NOT NULL DEFAULT 'cpf' ,
  `usuarioDocumento` VARCHAR(40) NOT NULL ,
  `usuarioLogin` VARCHAR(100) NOT NULL ,
  `usuarioSenha` VARCHAR(100) NOT NULL ,
  `usuarioLembrete` VARCHAR(200) NULL ,
  `usuarioStatus` DECIMAL(3,0) NOT NULL DEFAULT 1 COMMENT '1 - ativo\n2 - inativo' ,
  `usuarioDataCadastro` DATETIME NOT NULL ,
  UNIQUE INDEX `idusuario_UNIQUE` (`usuarioId` ASC) ,
  PRIMARY KEY (`usuarioId`) ,
  INDEX `fk_usuario_nivel1` (`nivelId` ASC) ,
  UNIQUE INDEX `documento_UNIQUE` (`usuarioDocumento` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`usuarioLogin` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`chat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`chat` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`chat` (
  `chatId` INT NOT NULL AUTO_INCREMENT ,
  `chatConversa` VARCHAR(800) NOT NULL ,
  PRIMARY KEY (`chatId`) ,
  UNIQUE INDEX `id_UNIQUE` (`chatId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`usuarioXchat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`usuarioXchat` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`usuarioXchat` (
  `usuarioXchatId` INT NOT NULL AUTO_INCREMENT ,
  `usuarioId` INT NOT NULL ,
  `chatId` INT NOT NULL ,
  INDEX `fk_usuarioXchat_usuario2` (`usuarioId` ASC) ,
  INDEX `fk_usuarioXchat_chat2` (`chatId` ASC) ,
  PRIMARY KEY (`usuarioXchatId`) ,
  UNIQUE INDEX `id_UNIQUE` (`usuarioXchatId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`pais` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`pais` (
  `paisId` INT NOT NULL AUTO_INCREMENT ,
  `paisNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`paisId`) ,
  UNIQUE INDEX `id_UNIQUE` (`paisId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`estado` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`estado` (
  `estadoId` INT NOT NULL AUTO_INCREMENT ,
  `paisId` INT NOT NULL ,
  `estadoNome` VARCHAR(100) NOT NULL ,
  `estadoUf` CHAR(2) NOT NULL ,
  PRIMARY KEY (`estadoId`) ,
  INDEX `fk_estado_pais1` (`paisId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`estadoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cidade` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cidade` (
  `cidadeId` INT NOT NULL AUTO_INCREMENT ,
  `estadoId` INT NOT NULL ,
  `cidadeNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`cidadeId`) ,
  INDEX `fk_cidade_estado1` (`estadoId` ASC) ,
  UNIQUE INDEX `cidade_UNIQUE` (`cidadeId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`logradouro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`logradouro` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`logradouro` (
  `logradouroId` INT NOT NULL AUTO_INCREMENT ,
  `cidadeId` INT NOT NULL ,
  `logradouroNome` VARCHAR(100) NOT NULL ,
  `logradouroBairro` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`logradouroId`) ,
  UNIQUE INDEX `id_UNIQUE` (`logradouroId` ASC) ,
  INDEX `fk_logradouro_cidade1` (`cidadeId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`hotel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`hotel` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`hotel` (
  `hotelId` INT NOT NULL AUTO_INCREMENT ,
  `hotelNome` VARCHAR(100) NOT NULL ,
  `hotelCnpj` VARCHAR(100) NOT NULL ,
  `hotelInscricaoEstadual` VARCHAR(100) NOT NULL ,
  `hotelEmail` VARCHAR(100) NOT NULL ,
  `hotelObservacao` VARCHAR(800) NULL ,
  `hotelGerente` VARCHAR(100) NOT NULL ,
  `hotelDataCadastro` VARCHAR(100) NULL ,
  PRIMARY KEY (`hotelId`) ,
  UNIQUE INDEX `hotel_cnpj_UNIQUE` (`hotelCnpj` ASC) ,
  UNIQUE INDEX `hotel_nome_UNIQUE` (`hotelNome` ASC) ,
  UNIQUE INDEX `hotel_inscricao_estadual_UNIQUE` (`hotelInscricaoEstadual` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`hotelEmail` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`hotelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`telefone` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`telefone` (
  `telefoneId` INT NOT NULL AUTO_INCREMENT ,
  `hotelId` INT NULL ,
  `usuarioId` INT NULL ,
  `telefoneDdi` DECIMAL(5) NULL DEFAULT 55 ,
  `telefoneDdd` DECIMAL(5) NOT NULL ,
  `telefoneNumero` CHAR(15) NOT NULL ,
  `telefoneTipo` ENUM('residencial', 'celular', 'comercial') NOT NULL ,
  `telefoneRamal` DECIMAL(5) NULL ,
  `telefoneRecado` VARCHAR(100) NULL ,
  `telefoneDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`telefoneId`) ,
  INDEX `fk_telefone_usuario1` (`usuarioId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`telefoneId` ASC) ,
  INDEX `hotel6` (`hotelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`ambiente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`ambiente` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`ambiente` (
  `ambienteId` INT NOT NULL AUTO_INCREMENT ,
  `ambienteNome` VARCHAR(100) NOT NULL ,
  `ambienteObservacao` VARCHAR(800) NULL ,
  `ambienteValor` DECIMAL(10,2) NOT NULL ,
  `ambienteReservado` TINYINT(1) NOT NULL DEFAULT 0 ,
  `ambienteDataCadastro` DATETIME NOT NULL ,
  `hotelId` INT NOT NULL ,
  PRIMARY KEY (`ambienteId`) ,
  UNIQUE INDEX `ambiente_UNIQUE` (`ambienteId` ASC) ,
  INDEX `hotel5` (`hotelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`servico` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`servico` (
  `servicoId` INT NOT NULL AUTO_INCREMENT ,
  `servicoNome` VARCHAR(100) NOT NULL ,
  `servicoObservacao` VARCHAR(800) NULL ,
  `servicoValor` DECIMAL(10,2) NOT NULL ,
  `servicoDataCadastro` DATETIME NOT NULL ,
  `hotelId` INT NOT NULL ,
  PRIMARY KEY (`servicoId`) ,
  UNIQUE INDEX `id_UNIQUE` (`servicoId` ASC) ,
  INDEX `hotel4` (`hotelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cama`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cama` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cama` (
  `camaId` INT NOT NULL AUTO_INCREMENT ,
  `camaNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`camaId`) ,
  UNIQUE INDEX `cama_UNIQUE` (`camaId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`tipoQuarto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`tipoQuarto` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`tipoQuarto` (
  `tipoQuartoId` INT NOT NULL AUTO_INCREMENT ,
  `tipoQuartoDescricao` VARCHAR(100) NOT NULL ,
  `cardapioTipoDataCadastro` TIMESTAMP NULL ,
  PRIMARY KEY (`tipoQuartoId`) ,
  UNIQUE INDEX `id_UNIQUE` (`tipoQuartoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`status` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`status` (
  `statusId` INT NOT NULL ,
  `statusDescricao` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`statusId`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`quarto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`quarto` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`quarto` (
  `quartoId` INT NOT NULL AUTO_INCREMENT ,
  `tipoQuartoId` INT NOT NULL ,
  `hotelId` INT NOT NULL ,
  `quartoNumero` VARCHAR(100) NOT NULL ,
  `quartoDescricao` VARCHAR(800) NULL ,
  `quartoValor` DECIMAL(10,2) NOT NULL ,
  `quartoDataCadastro` DATETIME NOT NULL ,
  `statusQuartoId` INT NOT NULL ,
  PRIMARY KEY (`quartoId`) ,
  UNIQUE INDEX `quartos_numero_UNIQUE` (`quartoNumero` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`quartoId` ASC) ,
  INDEX `tipoQuarto2` (`tipoQuartoId` ASC) ,
  INDEX `hotel2` (`hotelId` ASC) ,
  INDEX `statusQuarto1` (`statusQuartoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cardapioTipo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cardapioTipo` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cardapioTipo` (
  `cardapioTipoId` INT NOT NULL AUTO_INCREMENT ,
  `cardapioTipoNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`cardapioTipoId`) ,
  UNIQUE INDEX `id_UNIQUE` (`cardapioTipoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cardapio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cardapio` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cardapio` (
  `cardapioId` INT NOT NULL AUTO_INCREMENT ,
  `cardapioTipoId` INT NOT NULL ,
  `hotelId` INT NOT NULL ,
  `cardapioNome` VARCHAR(100) NOT NULL ,
  `cardapioTempo` VARCHAR(100) NULL ,
  `cardapioDescricao` VARCHAR(200) NOT NULL ,
  `cardapioValorCalorico` DECIMAL(3,0) NULL ,
  `cardapioValor` DECIMAL(10,2) NOT NULL ,
  `cardapioObservacao` VARCHAR(800) NULL ,
  `cardapioDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`cardapioId`) ,
  INDEX `fk_cardapios_cardapioTipos1` (`cardapioTipoId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`cardapioId` ASC) ,
  INDEX `hotel3` (`hotelId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`pacote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`pacote` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`pacote` (
  `pacoteId` INT NOT NULL AUTO_INCREMENT ,
  `quartoId` INT NULL ,
  `ambienteId` INT NULL ,
  `servicoId` INT NULL ,
  `cardapioId` INT NULL ,
  `pacoteNome` VARCHAR(100) NOT NULL ,
  `pacoteDataInicial` DATE NULL ,
  `pacoteDataFinal` DATE NULL ,
  `pacotePeriodo` DECIMAL(2) NULL ,
  `pacotePessoas` INT NOT NULL ,
  `pacoteDesconto` DECIMAL(2,2) NOT NULL ,
  `pacoteDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`pacoteId`) ,
  INDEX `fk_pacote_quartos1` (`quartoId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`pacoteId` ASC) ,
  INDEX `ambiente3` (`ambienteId` ASC) ,
  INDEX `servico1` (`servicoId` ASC) ,
  INDEX `cardapio2` (`cardapioId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`reserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`reserva` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`reserva` (
  `reservaId` INT NOT NULL AUTO_INCREMENT ,
  `usuarioId` INT NOT NULL ,
  `reservaCheckIn` TINYINT(1) NOT NULL ,
  `reservaFinalizado` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`reservaId`) ,
  INDEX `fk_reservas_usuarios1` (`usuarioId` ASC) ,
  UNIQUE INDEX `reserva_UNIQUE` (`reservaId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`itemReserva`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`itemReserva` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`itemReserva` (
  `itemReservaId` INT NOT NULL AUTO_INCREMENT ,
  `reservaId` INT NOT NULL ,
  `quartoId` INT NULL ,
  `pacoteId` INT NULL ,
  `ambienteId` INT NULL ,
  `servicoId` INT NULL ,
  `cardapioId` INT NULL ,
  `itemReservaDataInicial` DATETIME NOT NULL ,
  `itemReservaDataFinal` DATETIME NULL ,
  `itemReservaDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`itemReservaId`) ,
  INDEX `fk_reserva_quartos1` (`quartoId` ASC) ,
  INDEX `fk_itens_reserva_reserva1` (`reservaId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`itemReservaId` ASC) ,
  INDEX `cardapio1` (`cardapioId` ASC) ,
  INDEX `ambiente1` (`ambienteId` ASC) ,
  INDEX `pacote1` (`pacoteId` ASC) ,
  INDEX `servico2` (`servicoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`pagamento` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`pagamento` (
  `pagamentoId` INT NOT NULL AUTO_INCREMENT ,
  `pagamentoNome` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`pagamentoId`) ,
  UNIQUE INDEX `pagamento_UNIQUE` (`pagamentoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`financeiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`financeiro` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`financeiro` (
  `financeiroId` INT NOT NULL AUTO_INCREMENT ,
  `reservaId` INT NOT NULL ,
  `pagamentoId` INT NOT NULL ,
  `usuarioSistemaId` INT NOT NULL ,
  `financeiroValor` DECIMAL(10,2) NOT NULL ,
  `financeiroDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`financeiroId`) ,
  INDEX `fk_financeiro_pagamento1` (`pagamentoId` ASC) ,
  INDEX `fk_financeiros_reservas1` (`reservaId` ASC) ,
  UNIQUE INDEX `financeiro_UNIQUE` (`financeiroId` ASC) ,
  INDEX `usuario2` (`usuarioSistemaId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cep`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cep` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cep` (
  `cepId` INT NOT NULL AUTO_INCREMENT ,
  `logradouroId` INT NOT NULL ,
  `cepNumero` DECIMAL(15) NOT NULL ,
  PRIMARY KEY (`cepId`) ,
  UNIQUE INDEX `id_UNIQUE` (`cepId` ASC) ,
  INDEX `logradouro1` (`logradouroId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`ramal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`ramal` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`ramal` (
  `ramalId` INT NOT NULL AUTO_INCREMENT ,
  `quartoId` INT NULL ,
  `ambienteId` INT NULL ,
  `ramalNumero` DECIMAL(5) NOT NULL ,
  PRIMARY KEY (`ramalId`) ,
  INDEX `fk_ramal_quartos1` (`quartoId` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`ramalId` ASC) ,
  INDEX `ambiente2` (`ambienteId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`quartoXcama`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`quartoXcama` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`quartoXcama` (
  `quartoXcamaId` INT NOT NULL AUTO_INCREMENT ,
  `camaId` INT NOT NULL ,
  `tipoQuartoId` INT NOT NULL ,
  INDEX `fk_quartoXcama_camas1` (`camaId` ASC) ,
  PRIMARY KEY (`quartoXcamaId`) ,
  UNIQUE INDEX `quartoXcama_UNIQUE` (`quartoXcamaId` ASC) ,
  INDEX `tipoQuarto1` (`tipoQuartoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cepXedicao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cepXedicao` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cepXedicao` (
  `cepXedicaoId` INT NOT NULL AUTO_INCREMENT ,
  `hotelId` INT NULL ,
  `usuarioId` INT NULL ,
  `cepId` INT NULL ,
  `cepXedicaoNumero` VARCHAR(100) NOT NULL ,
  `cepXedicaoComplemento` VARCHAR(100) NULL ,
  `cepXedicaoTipo` DECIMAL(1,0) NOT NULL COMMENT '1 - cadastrar\n2 - não cadastrar' ,
  UNIQUE INDEX `cepXedicaoId_UNIQUE` (`cepXedicaoId` ASC) ,
  PRIMARY KEY (`cepXedicaoId`, `cepXedicaoNumero`) ,
  INDEX `usuario1` (`usuarioId` ASC) ,
  INDEX `hotel1` (`hotelId` ASC) ,
  INDEX `cep1` (`cepId` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cepUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cepUsuario` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cepUsuario` (
  `cepUsuarioId` INT NOT NULL ,
  PRIMARY KEY (`cepUsuarioId`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`cepCadastro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`cepCadastro` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`cepCadastro` (
  `cepCadastroId` INT NOT NULL AUTO_INCREMENT ,
  `cepXedicaoId` INT NOT NULL ,
  `cepCadastroCep` VARCHAR(100) NOT NULL ,
  `cepCadastroLogradouro` VARCHAR(100) NOT NULL ,
  `cepCadastroBairro` VARCHAR(100) NOT NULL ,
  `cepCadastroCidade` VARCHAR(100) NOT NULL ,
  `cepCadastroEstado` VARCHAR(100) NOT NULL ,
  `cepCadastroPais` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`cepCadastroId`) ,
  UNIQUE INDEX `cepCadastroId_UNIQUE` (`cepCadastroId` ASC) ,
  INDEX `cepXedicao1` (`cepXedicaoId` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hotel_v4`.`foto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hotel_v4`.`foto` ;

CREATE  TABLE IF NOT EXISTS `hotel_v4`.`foto` (
  `fotoId` INT NOT NULL ,
  `tipoQuartoId` INT NULL ,
  `ambienteId` INT NULL ,
  `cardapioId` INT NULL ,
  `servicoId` INT NULL ,
  `fotoNome` VARCHAR(100) NOT NULL ,
  `fotoDataCadastro` DATETIME NOT NULL ,
  PRIMARY KEY (`fotoId`) ,
  INDEX `tipoQuarto3` (`tipoQuartoId` ASC) ,
  INDEX `cardapio3` (`cardapioId` ASC) ,
  INDEX `ambiente4` (`ambienteId` ASC) ,
  INDEX `servico3` (`servicoId` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`nivel`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`nivel` (`nivelId`, `nivelNome`) VALUES (1, 'desenvolvedor');
INSERT INTO `hotel_v4`.`nivel` (`nivelId`, `nivelNome`) VALUES (2, 'gerente');
INSERT INTO `hotel_v4`.`nivel` (`nivelId`, `nivelNome`) VALUES (3, 'recepção');
INSERT INTO `hotel_v4`.`nivel` (`nivelId`, `nivelNome`) VALUES (4, 'cliente');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`usuario` (`usuarioId`, `nivelId`, `usuarioNome`, `usuarioEmail`, `usuarioDataNascimento`, `usuarioSexo`, `usuarioDocumentoTipo`, `usuarioDocumento`, `usuarioLogin`, `usuarioSenha`, `usuarioLembrete`, `usuarioStatus`, `usuarioDataCadastro`) VALUES (1, 1, 'Desenvolvedor', 'desenv@hotmail.com', '1977-06-23', 'm', 'cpf', '000.000.000-00', 'desenv', 'b4e883efe3b956d74d28f520dbf4a6f8', 'eu', 1, '2012-06-06');
INSERT INTO `hotel_v4`.`usuario` (`usuarioId`, `nivelId`, `usuarioNome`, `usuarioEmail`, `usuarioDataNascimento`, `usuarioSexo`, `usuarioDocumentoTipo`, `usuarioDocumento`, `usuarioLogin`, `usuarioSenha`, `usuarioLembrete`, `usuarioStatus`, `usuarioDataCadastro`) VALUES (2, 2, 'Gerente', 'gerente@hotmail.com', '1977-06-23', 'm', 'cpf', '000.000.000-01', 'gerente', '740d9c49b11f3ada7b9112614a54be41', 'eu', 1, '2012-06-06');
INSERT INTO `hotel_v4`.`usuario` (`usuarioId`, `nivelId`, `usuarioNome`, `usuarioEmail`, `usuarioDataNascimento`, `usuarioSexo`, `usuarioDocumentoTipo`, `usuarioDocumento`, `usuarioLogin`, `usuarioSenha`, `usuarioLembrete`, `usuarioStatus`, `usuarioDataCadastro`) VALUES (3, 3, 'Recepção', 'recepcao@hotmail.com', '1977-06-23', 'f', 'cpf', '000.000.000-02', 'recepcao', 'cc48ec325b30f776c93a0e971cdd24fd', 'eu', 1, '2012-06-06');
INSERT INTO `hotel_v4`.`usuario` (`usuarioId`, `nivelId`, `usuarioNome`, `usuarioEmail`, `usuarioDataNascimento`, `usuarioSexo`, `usuarioDocumentoTipo`, `usuarioDocumento`, `usuarioLogin`, `usuarioSenha`, `usuarioLembrete`, `usuarioStatus`, `usuarioDataCadastro`) VALUES (4, 4, 'Cliente', 'cliente@hotmail.com', '1977-06-23', 'm', 'cpf', '000.000.000-03', 'cliente', '4983a0ab83ed86e0e7213c8783940193', 'eu', 1, '2012-06-06');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`hotel`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`hotel` (`hotelId`, `hotelNome`, `hotelCnpj`, `hotelInscricaoEstadual`, `hotelEmail`, `hotelObservacao`, `hotelGerente`, `hotelDataCadastro`) VALUES (1, 'Hotel Padão', '42.745.930/0001-14', '91396104160', 'padrao@hotel.com.br', 'Obs padão', 'Darth Vader', '2012-06-06');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`telefone`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`telefone` (`telefoneId`, `hotelId`, `usuarioId`, `telefoneDdi`, `telefoneDdd`, `telefoneNumero`, `telefoneTipo`, `telefoneRamal`, `telefoneRecado`, `telefoneDataCadastro`) VALUES (1, NULL, 1, 55, 41, '3333-3333', 'Celular', 500, 'Alguem', '2012-06-06');
INSERT INTO `hotel_v4`.`telefone` (`telefoneId`, `hotelId`, `usuarioId`, `telefoneDdi`, `telefoneDdd`, `telefoneNumero`, `telefoneTipo`, `telefoneRamal`, `telefoneRecado`, `telefoneDataCadastro`) VALUES (2, NULL, 2, 55, 41, '2222-2222', 'Celular', 500, 'Alguem', '2012-06-06');
INSERT INTO `hotel_v4`.`telefone` (`telefoneId`, `hotelId`, `usuarioId`, `telefoneDdi`, `telefoneDdd`, `telefoneNumero`, `telefoneTipo`, `telefoneRamal`, `telefoneRecado`, `telefoneDataCadastro`) VALUES (3, NULL, 3, 55, 41, '1111-1111', 'Celular', 500, 'Alguem', '2012-06-06');
INSERT INTO `hotel_v4`.`telefone` (`telefoneId`, `hotelId`, `usuarioId`, `telefoneDdi`, `telefoneDdd`, `telefoneNumero`, `telefoneTipo`, `telefoneRamal`, `telefoneRecado`, `telefoneDataCadastro`) VALUES (4, NULL, 4, 55, 41, '5555-5555', 'Celular', 500, 'Alguem', '2012-06-06');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`cama`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`cama` (`camaId`, `camaNome`) VALUES (1, 'solteiro');
INSERT INTO `hotel_v4`.`cama` (`camaId`, `camaNome`) VALUES (2, 'casal');
INSERT INTO `hotel_v4`.`cama` (`camaId`, `camaNome`) VALUES (3, 'beliche');
INSERT INTO `hotel_v4`.`cama` (`camaId`, `camaNome`) VALUES (4, 'berço');
INSERT INTO `hotel_v4`.`cama` (`camaId`, `camaNome`) VALUES (5, 'suite');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`tipoQuarto`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`tipoQuarto` (`tipoQuartoId`, `tipoQuartoDescricao`, `cardapioTipoDataCadastro`) VALUES (1, 'Entrada', NULL);
INSERT INTO `hotel_v4`.`tipoQuarto` (`tipoQuartoId`, `tipoQuartoDescricao`, `cardapioTipoDataCadastro`) VALUES (2, 'Principal', NULL);
INSERT INTO `hotel_v4`.`tipoQuarto` (`tipoQuartoId`, `tipoQuartoDescricao`, `cardapioTipoDataCadastro`) VALUES (3, 'Acompanhamento', NULL);
INSERT INTO `hotel_v4`.`tipoQuarto` (`tipoQuartoId`, `tipoQuartoDescricao`, `cardapioTipoDataCadastro`) VALUES (4, 'Sobremesa', NULL);
INSERT INTO `hotel_v4`.`tipoQuarto` (`tipoQuartoId`, `tipoQuartoDescricao`, `cardapioTipoDataCadastro`) VALUES (5, 'Bebida', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`status`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`status` (`statusId`, `statusDescricao`) VALUES (1, 'nao reservado');
INSERT INTO `hotel_v4`.`status` (`statusId`, `statusDescricao`) VALUES (2, 'nao reservado');
INSERT INTO `hotel_v4`.`status` (`statusId`, `statusDescricao`) VALUES (3, 'manutencao');
INSERT INTO `hotel_v4`.`status` (`statusId`, `statusDescricao`) VALUES (4, 'inativo');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`cardapioTipo`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (1, 'entrada');
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (2, 'principal');
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (3, 'acompanhamento');
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (4, 'sobremesa');
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (5, 'bebida');
INSERT INTO `hotel_v4`.`cardapioTipo` (`cardapioTipoId`, `cardapioTipoNome`) VALUES (6, 'alcoólico');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`pagamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`pagamento` (`pagamentoId`, `pagamentoNome`) VALUES (1, 'dinheiro');
INSERT INTO `hotel_v4`.`pagamento` (`pagamentoId`, `pagamentoNome`) VALUES (2, 'débito');
INSERT INTO `hotel_v4`.`pagamento` (`pagamentoId`, `pagamentoNome`) VALUES (3, 'cartão');
INSERT INTO `hotel_v4`.`pagamento` (`pagamentoId`, `pagamentoNome`) VALUES (4, 'cheque');

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`cepXedicao`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`cepXedicao` (`cepXedicaoId`, `hotelId`, `usuarioId`, `cepId`, `cepXedicaoNumero`, `cepXedicaoComplemento`, `cepXedicaoTipo`) VALUES (1, NULL, 1, NULL, '666', 'Toda do Rato', 1);
INSERT INTO `hotel_v4`.`cepXedicao` (`cepXedicaoId`, `hotelId`, `usuarioId`, `cepId`, `cepXedicaoNumero`, `cepXedicaoComplemento`, `cepXedicaoTipo`) VALUES (2, NULL, 2, NULL, '333', 'Casa', 1);
INSERT INTO `hotel_v4`.`cepXedicao` (`cepXedicaoId`, `hotelId`, `usuarioId`, `cepId`, `cepXedicaoNumero`, `cepXedicaoComplemento`, `cepXedicaoTipo`) VALUES (3, NULL, 3, NULL, '666', 'Casa', 1);
INSERT INTO `hotel_v4`.`cepXedicao` (`cepXedicaoId`, `hotelId`, `usuarioId`, `cepId`, `cepXedicaoNumero`, `cepXedicaoComplemento`, `cepXedicaoTipo`) VALUES (4, NULL, 4, NULL, '333', 'Casa', 1);
INSERT INTO `hotel_v4`.`cepXedicao` (`cepXedicaoId`, `hotelId`, `usuarioId`, `cepId`, `cepXedicaoNumero`, `cepXedicaoComplemento`, `cepXedicaoTipo`) VALUES (5, 1, NULL, NULL, '666', 'Bera Mar', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `hotel_v4`.`cepCadastro`
-- -----------------------------------------------------
START TRANSACTION;
USE `hotel_v4`;
INSERT INTO `hotel_v4`.`cepCadastro` (`cepCadastroId`, `cepXedicaoId`, `cepCadastroCep`, `cepCadastroLogradouro`, `cepCadastroBairro`, `cepCadastroCidade`, `cepCadastroEstado`, `cepCadastroPais`) VALUES (1, 1, '81900-000', 'Rua Mac', 'Batel', 'Curitiba', 'Paraná', 'Brasil');
INSERT INTO `hotel_v4`.`cepCadastro` (`cepCadastroId`, `cepXedicaoId`, `cepCadastroCep`, `cepCadastroLogradouro`, `cepCadastroBairro`, `cepCadastroCidade`, `cepCadastroEstado`, `cepCadastroPais`) VALUES (2, 2, '81900-000', 'Av Batel', 'Batel', 'Curitiba', 'Paraná', 'Brasil');
INSERT INTO `hotel_v4`.`cepCadastro` (`cepCadastroId`, `cepXedicaoId`, `cepCadastroCep`, `cepCadastroLogradouro`, `cepCadastroBairro`, `cepCadastroCidade`, `cepCadastroEstado`, `cepCadastroPais`) VALUES (3, 3, '81900-000', 'Rua do Pagode', 'Favela', 'Curitiba', 'Paraná', 'Brasil');
INSERT INTO `hotel_v4`.`cepCadastro` (`cepCadastroId`, `cepXedicaoId`, `cepCadastroCep`, `cepCadastroLogradouro`, `cepCadastroBairro`, `cepCadastroCidade`, `cepCadastroEstado`, `cepCadastroPais`) VALUES (4, 4, '81900-000', 'Rua do Mundo', 'Batel', 'Curitiba', 'Paraná', 'Brasil');
INSERT INTO `hotel_v4`.`cepCadastro` (`cepCadastroId`, `cepXedicaoId`, `cepCadastroCep`, `cepCadastroLogradouro`, `cepCadastroBairro`, `cepCadastroCidade`, `cepCadastroEstado`, `cepCadastroPais`) VALUES (5, 5, '81900-000', 'Rua das Malvinas', 'Praia', 'Matinhos', 'Paraná', 'Brasil');

COMMIT;
