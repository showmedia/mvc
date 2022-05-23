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

    <form action="/notes/criar" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="input-field col s12">
            <input id="titulo" type="text" name="titulo" class="validate">
            <label for="titulo">Titulo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <textarea id="textarea1" name="texto" class="materialize-textarea"></textarea>
            <label for="textarea1">Escreva seu texto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <p>Imagem: </p>
            <input type="file" id="imagem" name="foo" value="" class="waves-effect waves-light btn"/>
            </div>
        </div>
        
        <div class="row">
            <button class="waves-effect waves-light btn" name="cadastrar"> Cadastrar</button>
        </div>
    </form>
</div>