<div class="container">
    <h1>
        <?php if(!empty($test[0]->job_title)) echo 'Modifica esperienza';else echo 'Aggiungi esperienza';?>     
    </h1>
    <div class="error_form m-3 fw-bold">
        <?php echo validation_errors('<span>', '</span>'); ?>
    </div>    
    <?php 

        if(!empty($test[0]->job_title))
            echo form_open('job/add_function/'.$test[0]->id_test.'/'.$test[0]->id,'class="container d-flex flex-column justify-content-evenly align-items-stretch" style="height:400px"');
            else
                echo form_open('job/add_function/'.$test[0]->id,'class="container d-flex flex-column justify-content-evenly align-items-stretch" style="height:400px"');
        
         
    ?>

    <div class="form-floating">   
        <input type="text" class="form-control" placeholder="Titolo" name="job_title" value="<?php if(!empty($test[0]->job_title)) echo $test[0]->job_title;?>" />
        <label for="job_title" class="floatingTextarea2">Titolo dell'esperienza lavorativa</label>
    </div>
    <div class="form-floating">
        <textarea type='text' minlength="50" class="form-control" placeholder="Description"
        style="height:200px" name="job_description"><?php if(!empty($test[0]->job_description)) echo $test[0]->job_description;?></textarea>
        <label for="job_description">Descrizione</label>
    </div>
    
    <input type="submit" class="exp mt-4 p-3 align-self-center" name="submit" value="<?php if(!empty($test[0]->job_title)) echo 'Modifica la seguente esperienza';else echo 'Crea una nuova esperienza';?>" />

</form>
</div>