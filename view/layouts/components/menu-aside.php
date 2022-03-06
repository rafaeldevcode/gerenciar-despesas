<?php use Controle\Contas\Services\Login; ?>

<aside class="menu-aside">
    <nav class="nav">
        <ul>
            <?php 
                if(Login::auth() === true){ ?>
                    <li>
                        <div class="icon">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <a title="Adicionar nova empresa" href="/nova-empresa">Adicionar Empresa</a>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <a title="Adicionar uma nova despesa" href="/nova-despesa">Adicionar Despesa</a>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <a title="Adicionar novo ganho" href="/novo-ganho">Adicionar Ganho</a>
                    </li>
                    <li>
                        <details>
                            <summary>
                                <div class="icon">
                                    <i class="fa-regular fa-flag"></i>
                                </div>
                                Relatórios
                            </summary>
                            <ul>
                                <li>
                                    <a title="Relatório por mês" href="/relatorio/mensal">Mensal</a>
                                </li>
                                <li>
                                    <a title="Relatório Geral" href="/relatorio/geral">Geral</a>
                                </li>
                                <li>
                                    <a title="Relatório por CNPJ" href="/relatorio/cnpj">Por CNPJ</a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa-solid fa-user-pen"></i>
                        </div>
                        <a title="Editar Usuário" href="/editar-usuario">Editar Usuário</a>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                        <a title="Sair" href="/logout">Sair</a>
                    </li>
            <?php } else{ ?> 
                <li>
                    <div class="icon">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </div>
                    <a title="Entrar" href="/login">Entrar</a>
                </li>    
            <?php } ?>
        </ul>
    </nav>
</aside>