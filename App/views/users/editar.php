<div class="row container">
    <h3>Editar Usuário</h3>

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

    <form action="/users/editar/<?php echo $data['registros']['id'];?>" method="POST">

            <div class="row">
                <div class="input-field col s12">
                    <input id="nome" type="text" name="nome" value="<?php echo $data['registros']['nome'];?>" class="validate">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" value="<?php echo $data['registros']['email'];?>" class="validate">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="senha" type="password" name="senha"  class="validate">
                    <label for="senha">Senha</label>
                </div>
            </div>
        <button class="waves-effect waves-light btn blue" name="atualizar"> Salvar</button>
    </form>
</div>