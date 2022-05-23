
<div class="row container">
    <h3 class="">Fazer login</h3>
    
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
  
    <form action="/home/login" method="POST">
        <div class="row">
            <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate">
            <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="senha" type="password" name="senha" class="validate">
            <label for="senha">Senha</label>
            </div>
        </div>
   
        <button class="waves-effect waves-light btn" name="entrar">Entrar</button>
    </form>
</div>