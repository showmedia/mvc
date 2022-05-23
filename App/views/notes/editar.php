<div class="row container">
    <h3>Criar bloco de anotação</h3>

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


        <form action="/notes/editar/<?php echo $data['registros']['id'];?>" method="POST">
            <div class="row">
                <div class="input-field col s12">
                <input id="titulo" type="text" name="titulo" class="validate" value="<?php echo $data['registros']['titulo'];?>">
                <label for="titulo">Titulo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea id="textarea1" name="texto" class="materialize-textarea"><?php echo $data['registros']['texto'];?></textarea>
                <label for="textarea1">Bloco de Texto</label>
                </div>
            </div>
            <button class="waves-effect waves-light btn" name="atualizar"> Atualizar</button>
        </form>


</div>