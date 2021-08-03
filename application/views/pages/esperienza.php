<div class="container">

<h1>Aggiungi esperienza</h1>


<?php echo validation_errors(); ?>

<?php echo form_open('job/add_function/'.$test[0]->id,'class="container d-flex flex-column justify-content-evenly align-items-stretch" style="height:400px"'); ?>

    <div class="form-floating">   
        <input type="text" class="form-control" placeholder="Titolo" name="job_title" />
        <label for="job_title" class="floatingTextarea2">Titolo dell'esperienza lavorativa</label>
    </div>
    <div class="form-floating">

        <textarea type='text' minlength="50" 
        
        class="form-control" placeholder="Description"
        style="height:200px" name="job_description"></textarea>
        <label for="job_description">Descrizione</label>
    </div>

    <input type="submit" name="submit" value="Create news item" />

</form>
</div>