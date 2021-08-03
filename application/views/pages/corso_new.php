<div class="container" >
<?php echo validation_errors(); ?>
<?php echo form_open('corso/create','class="d-flex flex-column align-items-center"'); ?>
    <label for="title">Titolo</label>
    <input type="text" name="titolo" />
    <label for="title">Descrizione</label>
    <input type="text" name="descrizione" class="align-self-stretch " style="height:100px"/>    
    <input class="mt-2" type="submit" name="submit" value="Create news item" />

</form>
<div class="container-fluid">