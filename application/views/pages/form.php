<?php echo validation_errors(); ?>
<?php echo form_open('form/create'); ?>

    <label for="title">Nome</label>
    <input type="text" name="nome" />
    <label for="title">Cognome</label>
    <input type="text" name="cognome" />    
    <label for="title">Eta</label>
    <input type="number" name="eta">
    <label for="title">Genere</label>
    <input type="text" name="genere"></input>

    <input type="submit" name="submit" value="Create news item" />

</form>