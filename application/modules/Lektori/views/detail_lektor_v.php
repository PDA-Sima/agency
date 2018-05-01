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
                        <label>Meno lektora :</label>
                        <?php echo $meno ?>
                    </div>
                </div>

                <div class ="col-md-12">
                    <a href="<?php echo base_url();?>Admin/Lektori" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>