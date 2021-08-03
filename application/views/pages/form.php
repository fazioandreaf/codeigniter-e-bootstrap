<div class="container ">
    <?php 
    if(!empty($get))
    echo form_open('form/edit/'.$get[0]->id.' ','class="d-flex flex-column align-items-start position-relative"'); 
    else
    echo form_open('form/create','class="d-flex flex-column align-items-center position-relative"'); 
    ?>
    <div class="error_form">
        <?php echo validation_errors('<span>', '</span>'); ?>
    </div>
    <div>
    </div>
    <label for="title">Nome</label>    
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
    <label for="title">Cognome</label>
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
    <label for="title">Eta</label>
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
    <?php 
        $options = array(
            'Maschio'=> 'Maschio',
            'Femmina'=> 'Femmina',
            'Altro'=> 'Altro',
        );
        echo form_label('Genere', 'genere');
        if(!empty($get))
            echo form_dropdown('genere', $options, $get[0]->genere);
        else
            echo form_dropdown('genere', $options,'','class="form-select"');

    ?>
    <?php
    if(!empty($get))
        echo '<input class="mt-4 p-2" type="submit" name="submit" value="Edit">';
    else
        echo '<input class="mt-4 p-2" type="submit" name="submit" value="Crea un nuovo utente">';
    if(!empty($_SESSION['item']))
    echo $_SESSION['item'];

    ?>

    <?php echo form_close()?>
<div class="container-fluid">