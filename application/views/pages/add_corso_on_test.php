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
        echo form_open('/corso/add_function/'.$corso[0]->id); 
        foreach($table as $i){
            echo '<div class="d-flex justify-content-between align-left align-items-center">';
            $id=$i->id;
            echo '<input type="checkbox" class="form-check-input"  name="id_test[]" value="'.$id.'" id="'.$id.'" class="me-3"';
            if(in_array($id,$selected))
                echo 'checked>';
            else 
                echo '>';
            foreach($i as $k=>$v){
                echo '<span style="flex:1">'.$v.'</span>';
                // var_dump($v);
            }
            echo '</div>';      
        }
        ?>
        <button type="submit" class="mt-3 mb-3" >Aggiungi corsisti</button>
        <?php echo form_close()?>
    
        </div>
      
    </div>
</div>