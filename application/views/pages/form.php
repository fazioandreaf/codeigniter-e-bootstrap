<div class="container-fluid ">
    <?php echo form_open('form/create','class="d-flex flex-column align-items-start position-relative"'); ?>
    <div class="error_form">

        <?php echo validation_errors('<span>', '</span>'); ?>
    </div>
    <label for="title">Nome</label>    
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>" >
    <label for="title">Cognome</label>
    <input type="text" name="cognome"  value="<?php echo set_value('cognome'); ?>">   
    <label for="title">Eta</label>
    <input type="number" name="eta" value="<?php echo set_value('eta'); ?>">
    <?php 

        $options = array(
            'maschio'=> 'maschio',
            'femmina'=> 'femmina',
            'altro'=> 'altro',
        );
        $shirts_on_sale = array('small', 'large');
        echo form_label('Genere', 'genere');
        echo form_dropdown('genere', $options, 'Maschio');
    ?>
    <input class="mt-2" type="submit" name="submit" value="Create news item" />

    <?php echo form_close()?>
<div class="container-fluid">