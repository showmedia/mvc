<div class="row container">
    <br>



    <br>
    <a class="waves-effect waves-light btn blue" href="/users/cadastrar">Cadastrar novo Usuário</a>
    <h4>Usuários Cadastrados<h4>

    <?php if(!empty($data['mensagem'])):?>
                    <div class="card-panel teal lighten-2">
                    <?php
                        foreach($data['mensagem'] as $m):
                            echo $m."<br>";
                        endforeach;
                    ?>
                    </div><?php
                endif;
        ?>

    <?php foreach ($data['registros'] as $user): ?>

        <h5><?php echo $user['nome']?></a></h5>
        <p><?php echo $user['email']?></p>
        <?php if(isset($_SESSION['logado'])): ?>
            <a class="waves-effect waves-light btn orange" href="/users/editar/<?php echo $user['id'];?>"> Editar</a>
            <?php if($user['id'] != $_SESSION['userId']): ?>
                <a class="waves-effect waves-light btn red" href="/users/excluir/<?php echo $user['id'];?>"> Excluir</a>
            <?php endif; 
        endif; ?>
        <hr>
        <br>

    <?php endforeach; ?>
</div>