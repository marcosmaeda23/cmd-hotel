

<div class="menuTopo <?php echo $cor_principal; ?>" style="height: 70px !important;">
    <ul class="content adminNav">
        <div class="cf logo">
            <a href="../home/"> <?php echo $nome_site; ?> </a>
        </div>
        <div class="cf bemVindo">
            Bem vindo(a) <?php echo $_SESSION['NOME']; ?>
        </div>
        <div id="menu">
            <ul class="menu">
                <li><a href="" class="parent"><span>Gerenciar</span> </a>
                    <ul>
                        <li><a href="../usuario" class="parent"><span>Usuario</span> </a></li>
                        <?php if ($_SESSION['NIVEL'] != 4) { ?> 
                            <li><a href="../hotel" class="parent"><span>Hotel</span> </a></li>
                            <li><a href="../servico" class="parent"><span>Serviço</span> </a></li>
                            <li><a href="../quarto" class="parent"><span>Quarto</span> </a></li>
                            <li><a href="../cardapio" class="parent"><span>Cardapio</span> </a></li>
                            <li><a href="../cardapioTipo" class="parent"><span>Cardapio tipo</span> </a></li>
                            <li><a href="../pacote" class="parent"><span>Pacote</span> </a></li>
                            <li><a href="../ambiente" class="parent"><span>Ambiente</span> </a></li>
                            <li><a href="../financeiro" class="parent"><span>Financeio</span> </a>
                        <?php } ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="menu">
                <li><a href="../reserva" class="parent"><span>Reservas</span> </a></li>
            </ul>
            <ul class="menu">
                <li><a href="?acao=deslogar" class="parent"><span>Sair</span> </a></li>
            </ul>
        </div>
    </ul>
</div>
