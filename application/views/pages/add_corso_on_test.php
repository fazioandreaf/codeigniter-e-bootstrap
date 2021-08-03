<div class="container-fluid">

    <h1><?php 
        echo $table[0]->nome.' '.$table[0]->cognome;
        ?>
        </h1>
    <h2> Elenco Corsi</h2>
        <a href="/main/corso_new" class="mt-3 mb-3 d-inline-block">
            <button type="button" class="btn btn-primary">
                Inserimento nuovo corso
            </button>
        </a>
    <div class="container-md">
        <div class="d-flex flex-column">
        <div class="error_form">
            <?php echo validation_errors('<span>', '</span>'); ?>
        </div>

        <?php 
        echo form_open('/test/add_corsi_on_test/'.$table[0]->id,'class="container t-cust"'); 
        echo '<div class="row pb-2 border-bottom border-1 border-dark">
        <div class="col-1"></div><div class="col-3"><span class="fw-bolder">Titolo</span></div>
        <div class="col-8"><span class="fw-bolder">Descrizione</span></div>
    </div>';
        
        foreach($corso as $i){
            $id=$i->id;
            echo '<div class="row d-flex justify-content-between align-left align-items-center pt-2 pb-2 border-bottom border-1 border-dark">';
            echo '<div class="col-1"><input type="checkbox" class="form-check-input me-3"  name="id_corsi[]" value="'.$id.'"  ';
            if(in_array($id,$selected))
                echo 'checked>';
            else 
                echo '>';
                
                echo '</div><div class="col-3"><span>'.$i->titolo.'</span></div>';
                echo '<span class="col-8">'.$i->descrizione.'</span>';
                // var_dump($v);
            echo '</div>';      
        }
        ?>
        <button type="submit" class="mt-3 mb-3" >Iscriviti ai corsi</button>
        <?php echo form_close()?>
    
        </div>
      
    </div>
</div>