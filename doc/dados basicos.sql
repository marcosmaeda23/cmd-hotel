-- levantamento do nivel --
INSERT INTO `Hotel_V1`.`nivel` (`nome`) VALUES 
( 'desenvolvedor'), ('gerente'), ('recepcao');

-- levantamento do usuario desenvolvedor --

INSERT INTO `Hotel_V1`.`usuario` 
(`id`, `nivelId`, `nome`, `email`, `documentoTipo`, `documento`, 
`login`, `senha`, `lembrete`, `status`, `dataCadastro`) 
 VALUES 
 (NULL, '1', 'Viagem na Boa', 'contato@viagemnaboa.com.br', 'cpf', '111.222.333-44', 
 ß'viagem', '9d2cce938cb7e255b25714005c80d268', 'sem lembrete', '1', '2012-05-17 17:44:59');

