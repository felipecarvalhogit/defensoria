<?php
session_start();
include('verifica_login.php');
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Defensoria</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="img/favicon16x16.ico" sizes="16x16">
    <link rel="icon" href="img/favicon32x32.ico" sizes="32x32">
    <link rel="icon" href="img/favicon48x48.ico" sizes="48x48">
    <link rel="icon" href="img/favicon64x64.ico" sizes="64x64">
    <link rel="icon" href="img/favicon128x128.ico" sizes="128x128">
</head>

<body>
<nav class="navbar navbar-default navbar-expand-xl navbar-light">
        <div class="navbar-header d-flex col">
            <a class="navbar-brand" href="painel.php"><i class="fa fa-cube"></i>Portal<b>Defensoria</b></a>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                class="navbar-toggle navbar-toggler ml-auto">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a href="painel.php" class="nav-link">Atendimento</a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Cadastros <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cadastro.php" class="dropdown-item">Cadastrar Estagiário</a>
                        </li>
                        <li>
                            <a href="cadastroAssistido.php" class="dropdown-item">Cadastrar Assistido</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Serviços <b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="relDesempenho.php" class="dropdown-item">Relatório de Desempenho</a>
                        </li>
                        <li>
                            <a href="relAtividadeComplementar.php" class="dropdown-item">Relatório de Atividade
                                Complementar</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
                        <img src="https://www.tutorialrepublic.com/examples/images/avatar/2.jpg" class="avatar"
                            alt="Avatar" />
                        <?php echo $_SESSION['nome_func'];?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfil.php" class="dropdown-item"><i class="fa fa-user"></i>Perfil
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Sair
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    <section id="painel">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cadastro de Colaborador
                </div>
                <div class="panel-body">
                    <br />
                    <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <!--<p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>-->
                    <div class="alert alert-sucess" role="alert">
                        <h5 class="alert-heading">Cadastro efetuado!</h5>
                        <p class="mb-0">Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>

                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['matricula_existe'])):
                    ?>
                    <!--<p>O usuário escolhido já existe. Informe outro e tente novamente.</p>-->
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0">O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>

                    <?php
                    endif;
                    unset($_SESSION['matricula_existe']);
                    ?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Campo Obrigatório *</div>
                            </div>
                            <br />
                            <!--          NOVO FORM           -->

                            <!-- matrícula  -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                        <label for="matricula">Matrícula <h11>*</h11></label>
                                        <input name="mat_func" type="text" class="form-control" required="true"
                                            id="matricula" placeholder="Matrícula (5 dígitos)" min="00001" max="99999"
                                            maxlength="5" pattern="[0-9]+$">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control"></div>

                                    <!-- Tipo do Estagiário -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                        <label for="Tipo de Estagiário">Tipo do Estagiário <h11>*</h11></label>
                                        <?php
                                            $sql = "SELECT * FROM tipo_funcionario";
                                            $resultado = mysqli_query($conexao, $sql);
                                        ?>

                                        <select name="ID_TIPO_FUNC" class="form-control">
                                            <option value="">Selecione o tipo do Estagiário</option>
                                            <?php
                                                while($dados = mysqli_fetch_array($resultado)):
                                            ?>
                                            <option value="<?php echo $dados['ID_TIPO_FUNC']; ?>">
                                                <?php echo $dados['CARGO_FUNC']; ?>
                                            </option>
                                            <?php
                                                endwhile;
                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <br />

                            <!-- Nome Completo -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                        <label for="nome">Nome Completo <h11>*</h11></label>
                                        <input name="nome_func" type="text" class="form-control" required="true"
                                            id="nome" placeholder="Nome Completo">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                                    <!-- Horário do Estagiário -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                        <label for=" Horario de Estagiário">Horário do Estagiário<h11>*</h11></label>
                                        <select required id="hora_estagiario" name="hora_expediente_func"
                                            class="form-control">
                                            <option value="">Selecione o horário de expediente</option>
                                            <option name="hora_est_contratado_1" value="2019-07-10 07:00:00"
                                                class="est_contratado">seg à sex
                                                | 07:00 - 13:00</option>
                                            <option name="hora_est_contratado_2" value="2019-07-10 13:00:00"
                                                class="est_contratado">seg à sex
                                                | 13:00 - 19:00</option>
                                            <option name="hora_est_voluntario_1_1" value="2019-07-10 19:00:00"
                                                class="est_voluntario">seg -
                                                qua | 07:00 - 13:00</option>
                                            <option name="hora_est_voluntario_1_2" value="2019-07-10 07:00:00"
                                                class="est_voluntario">seg -
                                                qua | 13:00 - 19:00</option>
                                            <option name="hora_est_voluntario_2_1" value="2019-07-10 13:00:00"
                                                class="est_voluntario">ter -
                                                qui | 07:00 - 13:00</option>
                                            <option name="hora_est_voluntario_2_2" value="2019-07-10 19:00:00"
                                                class="est_voluntario">ter -
                                                qui | 13:00 - 19:00</option>
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <br />
                            <!-- E-mail -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control">
                                        <label for="email">E-mail <h11>*</h11></label>
                                        <input name="email_func" type="email" class="form-control" required="true"
                                            id="email" placeholder="Email">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 control"></div>

                                    <!-- Horário do Estagiário -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 control">
                                        <label for="instituicaoensino">Instituição de Ensino <h11>*</h11></label>
                                        <input name="instituicao_func" type="text" class="form-control" required="true"
                                            id="instituicaoensino" placeholder="Instituição de Ensino">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <!-- Senha -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                        <label for="senha">Senha <h11>*</h11></label>
                                        <input name="senha_func" type="password" class="form-control" required="true"
                                            id="senha" placeholder="Senha">
                                    </div>
                                </div>
                            </div>
                            <br />

                            <!-- Confirmação de Senha -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control">
                                        <label for="confirma_senha">Confirmação de Senha <h11>*</h11></label>
                                        <input name="confirma_senha" type="password" class="form-control"
                                            required="true" id="confirma_senha" placeholder="Confirmação de Senha">
                                    </div>
                                </div>
                            </div>


                            <br />
                            <!-- Botão de Envio / Cadastro -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary is-block is-link"> Cadastrar </button>
                            </div>
                        </form>

                        <!-- Script JQuery para segmentar horário dos estagiários -->
                        <script>
                        /*$('#tipo_estagiario').on('change', function() {
                            var classe = this.value;
                            var options = $('#hora_estagiario option').remove();
                            options.each(function() {
                                var opt = $(this);
                                if (opt.hasClass(classe)) opt.show();
                                else opt.hide();
                            });
                            $('#hora_estagiario').append(options);
                        });*/
                        </script>

                        <!-- Script JQuery para validar senha -->
                        <script>
                        var password = document.getElementById("senha_func"),
                            confirm_password = document.getElementById("confirma_senha");

                        function validatePassword() {
                            if (password.value != confirm_password.value) {
                                confirm_password.setCustomValidity("Senhas diferentes!");
                            } else {
                                confirm_password.setCustomValidity('');
                            }
                        }

                        password.onchange = validatePassword;
                        confirm_password.onkeyup = validatePassword;
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://ajasx.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>