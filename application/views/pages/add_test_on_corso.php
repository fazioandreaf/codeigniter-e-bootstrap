<div class="container-fluid" style="margin-bottom:100px">

    <h1><?php 
        echo $corso[0]->titolo;
        ?>
        </h1>
    <h2> Elenco corsisti nel database</h2>
        <a href="/main/form" class="mt-3 mb-3 d-inline-block">
            <button type="button" class="btn btn-primary">
                Inserimento nuovo  utente
            </button>
        </a>
    <div class="container-md">
        <div class="d-flex flex-column">
        <div class="error_form">
            <?php echo validation_errors('<span>', '</span>'); ?>
        </div>
        <?php 
        echo form_open('/corso/add_function/'.$corso[0]->id,'class="container t-cust "');
        echo '<div class="row pb-2 border-bottom border-1 border-dark">
        <div class="col-1"></div><div class="col-4"><span class="fw-bolder">Nome</span></div>
        <div class="col-3"><span class="fw-bolder">Cognome</span></div><div class="col-1"><span class="fw-bolder">Etá</span></div><div class="col-3"><span class="fw-bolder">Genere</span></div>
    </div>'; 
        foreach($table as $i){
            echo '<div class="row d-flex justify-content-between align-left align-items-center pt-2 pb-2 border-bottom border-1 border-dark">';
            $id=$i->id;
            echo '<div class="col-1"><input type="checkbox" class="form-check-input"  name="id_test[]" value="'.$id.'" id="'.$id.'" class="me-3"';
            if(in_array($id,$selected))
                echo 'checked>';
            else 
                echo '>';
            echo '</div>';
                echo '<div class="col-4"><span style="flex:1">'.$i->nome.'</span></div>';
                echo '<div class="col-3"><span style="flex:1">'.$i->cognome.'</span></div>';
                echo '<div class="col-1"><span style="flex:1">'.$i->eta.'</span></div>';
                echo '<div class="col-3"><span style="flex:1">'.$i->genere.'</span></div>';
            echo '</div>';      
        }
        ?>
        <button type="submit" class="mt-3 mb-3" >Aggiungi corsisti</button>
        <?php echo form_close()?>
    
        </div>
      
    </div>
</div>