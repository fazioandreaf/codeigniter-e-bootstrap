<div class="container-fluid ">
<?php echo validation_errors(); ?>
<?php echo form_open('corso/create','class="d-flex flex-column align-items-start"'); ?>
    <label for="title">Titolo</label>
    <input type="text" name="titolo" />
    <label for="title">Descrizione</label>
    <input type="text" name="descrizione" />    
    <input class="mt-2" type="submit" name="submit" value="Create news item" />

</form>
<div class="container-fluid">