<h1><?php 
    echo $corso[0]->titolo;
    ?>
    </h1>
<h2>add corsisti</h2>
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
    <button type="submit" class="" >Aggiungi corsisti</button>
    <?php echo form_close()?>

    </div>
  
</div>