<div class="row container">
    <h3>Cadastrar usuários</h3>

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


    <form action="/users/cadastrar" method="POST">
            <div class="row">
                <div class="input-field col s12">
                <input id="nome" type="text" name="nome" class="validate">
                <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate">
                <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="senha" type="password" name="senha" class="validate">
                <label for="senha">Senha</label>
                </div>
            </div>
        <button class="waves-effect waves-light btn" name="cadastrar"> Cadastrar</button>
    </form>
</div>