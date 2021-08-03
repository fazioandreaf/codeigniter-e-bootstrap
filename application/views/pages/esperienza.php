<div class="container">

<h1>Aggiungi esperienza</h1>


<?php echo validation_errors(); ?>

<?php echo form_open('job/add_function/'.$test[0]->id,'class="container d-flex flex-column justify-content-evenly align-items-center" style="height:400px"'); ?>

    <label for="title">Titolo dell'esperienza lavorativa</label>
    <input type="text" name="job_title" />

    <label for="text">Descrizione</label>
    <input type='text' style="width:400px !important;height:200px" name="job_description" />

    <input type="submit" name="submit" value="Create news item" />

</form>
</div>