<div class="container position-relative">
    <!-- <div class="error_form">
        <?php
        if(!empty($_SESSION['item']))
            echo '<span>'.$_SESSION['item'].'</span>';    
        else
            echo validation_errors('<span>', '</span>'); ?>
    </div> -->

    <?php 
    if(!empty($get))
    echo form_open('form/edit/'.$get[0]->id.' ','class="d-flex flex-column align-items-center justify-content-evenly " style="height:400px"'); 
    else
    echo form_open('form/create','class="d-flex flex-column align-items-center justify-content-evenly " style="height:400px"'); 
    ?>
    <div class="form-floating position-relative">   
        <div class="error_form">
            <?php
            if(!empty($_SESSION['item']))
                echo '<span>'.$_SESSION['item'].'</span>';    
            else
                echo validation_errors('<span>', '</span>'); ?>
        </div>
        <input type="text" class="form-control" name="nome" value="<?php
            if(!empty($_SESSION['item'])){
                if(!empty($get) && !strpos($_SESSION['item'],' nome') )
                    echo set_value('nome',$get[0]->nome);
                else
                    echo set_value('nome'); 
            }else{
                if(!empty($get) )
                echo set_value('nome',$get[0]->nome);
                else
                echo set_value('nome'); 
            }
        ?>" >
        <label for="nome" class="floatingTextarea2">Nome</label>    
    </div>
    <div class="form-floating">

        <input type="text" class="form-control" name="cognome"  value="<?php 
            if(!empty($_SESSION['item'])){
                if(!empty($get) && !strpos($_SESSION['item'],' cognome') )
                    echo set_value('nome',$get[0]->cognome);
                else
                    echo set_value('nome'); 
            }else{
                if(!empty($get) )
                echo set_value('nome',$get[0]->cognome);
                else
                echo set_value('nome'); 
            }
        ?>">   
        <label for="cognome" class="form-floating">Cognome</label>
    </div>
    <div class="form-floating">
        
        <input type="number" min="0" class="form-control" name="eta" value="<?php 
            if(!empty($_SESSION['item'])){
                if(!empty($get) && !strpos($_SESSION['item'],' et') )
                    echo set_value('nome',$get[0]->eta);
                else
                    echo set_value('nome'); 
            }else{
                if(!empty($get) )
                echo set_value('nome',$get[0]->eta);
                else
                echo set_value('nome'); 
            }
        ?>">
        <label for="eta">Eta</label>
    </div>
    <div class="form-floating">

    <?php 
        $options = array(
            'Maschio'=> 'Maschio',
            'Femmina'=> 'Femmina',
            'Altro'=> 'Altro',
        );
        if(!empty($get))
            echo form_dropdown('genere', $options, $get[0]->genere,'class="form-select"');
        else
            echo form_dropdown('genere', $options,'','class="form-select"');

        echo form_label('Genere', 'genere');
    ?>
    </div>
    <?php
    if(!empty($get)){
        echo '<input class="mt-4 p-2 ';
        if(!empty($view)){
            if($view=='test') echo ' test"';
            elseif($view=='corso') echo ' corso"';}
        echo 'type="submit" name="submit" value="Edit">';

    }
    else
        echo '<input class="mt-4 p-2 ';
        if(!empty($view)){
            if($view=='test') echo ' test"';
            elseif($view=='corso') echo ' corso"';}
        echo 'type="submit" name="submit" value="Crea un nuovo utente">';
    ?>




    <?php echo form_close()?>
<div class="container-fluid">