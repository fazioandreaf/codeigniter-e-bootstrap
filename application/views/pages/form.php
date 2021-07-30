<div class="container-fluid ">
<?php echo validation_errors(); ?>
<?php echo form_open('form/create','class="d-flex flex-column align-items-start"'); ?>
    <label for="title">Nome</label>
    <!-- <input type="text" name="nome" /> -->
    
<input type="text" name="nome" value="<?php echo set_value('nome'); ?>" size="50" />
    <label for="title">Cognome</label>
    <input type="text" name="cognome" />    
    <label for="title">Eta</label>
    <input type="number" name="eta">
    <label for="title">Genere</label>
    <input type="text" name="genere"></input>

    <input class="mt-2" type="submit" name="submit" value="Create news item" />

</form>
<div class="container-fluid">