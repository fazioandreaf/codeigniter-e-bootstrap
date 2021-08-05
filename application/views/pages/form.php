
<div class="container position-relative">
    <h1>
        <?php if(!empty($get)) echo 'Modifica corsista';else echo 'Aggiungi corsista'?>     
    </h1>
    <?php 
        
    if(!empty($get))
    echo form_open('form/edit/'.$get[0]->id.'','method="post" class="d-flex flex-column align-items-center justify-content-evenly '); 
    else
    echo form_open('form/create','class="d-flex flex-column align-items-center justify-content-evenly " style="min-height:400px"'); 
    ?>
    <div class="form-floating mt-3 position-relative">   
        <div class="error_form fw-bolder">
            <?php
            if(!empty($_SESSION['item']))
                echo '<span>'.$_SESSION['item'].'</span>';    
            else
                echo validation_errors('<span>', '</span>'); ?>
        </div>
        <input type="text" class="form-control" name="nome" value="<?php
            if(!empty($_SESSION['item'])){
                
                
                if(!empty($get) && !strpos($_SESSION['item'],' Name') )
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
    <div class="form-floating mt-3">

        <input type="text" class="form-control" name="cognome"  value="<?php 
            if(!empty($_SESSION['item'])){
                if(!empty($get) && !strpos($_SESSION['item'],' Surname') )
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
        <label for="cognome" class="floatingTextarea2">Cognome</label>
    </div>
    <div class="form-floating mt-3">
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
    <div class="form-floating mt-3">
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
        // if(!empty($exp)){
        //     echo '<div class="d-flex justify-content-evenly  flex-wrap mt-3">';
        //     foreach($exp as $i){
        //         echo '<div class="d-flex flex-column mt-3">
        //         <div class="form-floating"><input type="text" class="form-control" name="job_title['.$i->id.']" value="'.$i->job_title.'"/>';
        //         echo '<label for="job_title" class="form-floating">Titolo esperienza</label>
        //         ';
        //         echo'</div>';
        //         echo '<div class="form-floating">
        //         <textarea name="job_description['.$i->id.']" class="form-control mt-1" style="height:200px" >'.$i->job_description.'</textarea>';
        //         echo '<label for="job_description" class="form-floating">Desrizione </label>
        //         ';
        //         echo'</div>';            
        //         echo '</div>';
        //     }
        //     echo '</div>';
        // }
    
    if(!empty($get)){
        echo '<input  class="mt-4 p-2 ';
        if(!empty($view)){
            if($view=='test') echo ' test"';
            elseif($view=='corso') echo ' corso"';}
        echo 'type="submit" name="submit" value="Modifica">';
        }else{
            echo '<input style="margin-bottom:100px" class="mt-4 p-2 ';
            if(!empty($view)){
                if($view=='test') echo ' test"';
                elseif($view=='corso') echo ' corso"';}
            echo 'type="submit" name="submit" value="Crea un nuovo utente">';
    }
    ?>
    <?php echo form_close()?>
        <?php 
        if(!empty($exp)){
            echo '<div class="d-flex flex-column align-items-center mt-3"> <h3> Esperienze </h3>';
            echo '<div class="pt-4 pb-4 container-fluid t-cust" >
            <div class="row pt-1 pb-1">
                <div class="fw-bold col-4">Titolo</div>
                <div class="fw-bold col-4">Descrizione</div>
            </div>';
            foreach($exp as $i){
                echo '<div class="row pt-2 pb-2">';
                echo '<div class="col-4">'.$i->job_title.'</div>';
                echo '<div class="col-8 d-flex"><span>'.$i->job_description.'</span><span class="f-end "><a href="/job/add/'.$i->id_test.'/'.$i->id.'" style="color:var(--bs-purple)"><i class="fas fa-edit"></i></a></span></div>';
                echo '</div>';
            }
        }
        ?>
    </div>

<div class="container-fluid">