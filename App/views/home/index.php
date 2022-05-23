
  
<div class="row container">
    <br>
<div class="row">
    <div class="col s6">
    <nav>
        <div class="nav-wrapper">
        <form method="POST" action="/home/buscar">
            <div class="input-field">
            <input id="search" name="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
            </div>
        </form>
        </div>
    </nav>
    </div>
</div>

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

    <?php
        //Paginação
        $pagination = new App\Pagination($data['registros'], isset($_GET['page']) ? $_GET['page'] : 1, 5);
    ?>

    <?php
        if(empty($pagination->resultado())):
            echo "nenhum registro encontrado!";
        endif;
    ?>

    <?php foreach ($pagination->resultado() as $note): ?>

        <h2> <a href="/notes/ver/<?php echo $note['id']?>"><?php echo $note['titulo']?></a></h2>
        <p><?php echo $note['texto']?></p>
        <?php if(isset($_SESSION['logado'])): ?>
            <a class="waves-effect waves-light btn orange" href="/notes/editar/<?php echo $note['id'];?>"> Editar</a> 
            <a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $note['id'];?>"> Excluir</a>
        <?php endif; ?>
        <br>

    <?php endforeach; ?>

    <?php
        $pagination->navigator();
    ?>
</div>

