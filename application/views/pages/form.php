<?php echo validation_errors(); ?>
<?php echo form_open('form/create'); ?>

    <label for="title">Title</label>
    <input type="text" name="title" />

    <label for="text">Text</label>
    <textarea name="text"></textarea>

    <input type="submit" name="submit" value="Create news item" />

</form>