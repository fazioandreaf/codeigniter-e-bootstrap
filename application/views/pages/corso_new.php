<div class="container" >
<?php echo validation_errors(); ?>
<?php echo form_open('corso/create','class="d-flex flex-column align-items-center justify-content-evenly" style="height:400px"'); ?>
<div class="form-floating">
    <input type="text" class="form-control" name="titolo" placeholder="Titolo"/>
    <label for="title" class="floatingTextarea2">Titolo</label>
</div>
<div class="form-floating align-self-stretch"> 
    <textarea type="text" class="form-control" name="descrizione" style="height:200px" class="align-self-stretch "  placeholder="Descrizione"></textarea>    
    <label for="descrizione" class="floatingTextarea2">Descrizione</label>
</div>
    <input class="mt-2" type="submit" name="submit" value="Create news item" />

</form>
<div class="container-fluid">