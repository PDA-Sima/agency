<div class="row">
    <div class ="col-md-12">
        <form enctype="multipart/form-data">
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
                    <a href="<?php echo base_url();?>Admin/Kategorie" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>