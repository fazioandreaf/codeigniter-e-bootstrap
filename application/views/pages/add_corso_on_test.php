<div class="container-fluid">

    <h1><?php 
        echo $table[0]->nome.' '.$table[0]->cognome;
        ?>
        </h1>
    <h2> Elenco Corsi</h2>
        <a href="/main/corso_new" class="mt-3 mb-3 d-inline-block">
         Inserimento nuovo corso
        </a>
    <div class="container-md">
        <div class="d-flex flex-column">
        <div class="error_form">
            <?php echo validation_errors('<span>', '</span>'); ?>
        </div>
        <?php 
        echo form_open('/corso/add_corsi_on_test/'.$table[0]->id,'class="container"'); 
        
        foreach($corso as $i){
            $id=$i->id;
            echo '<div class="d-flex justify-content-between align-left align-items-center mt-2">';
            echo '<input type="checkbox" class="form-check-input me-3"  name="id_corsi[]" value="'.$id.'"  ';
            if(in_array($id,$selected))
                echo 'checked>';
            else 
                echo '>';
                echo '<span class="col-3" >'.$i->titolo.'</span>';
                echo '<span style="flex:1">'.$i->descrizione.'</span>';
                // var_dump($v);
            echo '</div>';      
        }
        ?>
        <button type="submit" class="mt-3 mb-3" >Iscriviti ai corsi</button>
        <?php echo form_close()?>
    
        </div>
      
    </div>
</div>