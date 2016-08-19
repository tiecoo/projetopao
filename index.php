<?php
include('head.php');
?>


<div style="text-align: center;">
    <h1 style="text-align: center;" style="color: greenyellow;">Peça seu pão!</h1>
    <div class="">
        <button class="btn btn-primary btn-lg col-md-6 col-md-offset-3 button" data-toggle="modal" data-target="#myModal">
            Cadastrar Funcionário
        </button></br></br></br>
    </div>
    <div class="">
        <button class="btn btn-primary btn-lg col-md-6 col-md-offset-3 button" data-toggle="modal" data-target="#myModal2">
            Pedir Pão
        </button></br></br></br>
    </div>
    <div class="">
        <a class="btn btn-primary btn-lg col-md-6 col-md-offset-3 button" href="list.php">
            Listar
        </a>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel">Cadastrar Funcionário</h2>
            </div>
            <div class="modal-body" style="height: 110px;">

                <form method="post" action="salvar.php" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-4">Cadastrar funcionário</label>
                        <input type="text" name="name" class="col-sm-8">
                    </div>
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="exampleInputEmail1" class="col-sm-4">Cadastrar e-mail</label>
                        <input type="text" name="email" class="col-sm-8">
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" onclick="saved()" value="Salvar" />
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel">Quem quer Pão?</h2>
            </div>
            <div class="modal-body">

                <form method="post" action="pedir.php" >
                    <div class="form-group">
                        <label>Pedir pão para:</label>
                        <select name='asker'>
                            <?php
                            require('conf/conexao.php');

                            $todos = mysqli_query($link, "SELECT nome, id FROM funcionarios where ativo = 1 ORDER BY nome");

                            while ($funcionario = mysqli_fetch_assoc($todos)) {
                                ?>
                                <option value='<?= ($funcionario['id']); ?>' ><?php echo strtoupper(utf8_encode(($funcionario['nome']))); ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>

                    <label>Com recheio?</label>
                    <select name='recheio'>
                        <option value='0' >Não</option>						
                        <option value='1' selected="selected">Sim</option>
                    </select>
            </div>					



            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Salvar" onclick="pedido()"/>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
