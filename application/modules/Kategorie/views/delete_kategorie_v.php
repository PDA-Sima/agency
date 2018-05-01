<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Kategorie/post_delete_kategorie" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Názov kategórie:</label>
                        <?php echo $Kategoria ?>
                    </div>
                </div>

                <div class ="col-md-12">
                    <button class="btn btn-danger btn-large btn-fill">Odstrániť</button>
                    <a href="<?php echo base_url();?>Admin/Kategorie" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>
