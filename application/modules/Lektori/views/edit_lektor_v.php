<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Lektori/post_edit_lektor" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">

                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Meno lektora</label>
                        <input type="text" name ="Lektor" value="<?php echo $Lektor ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <button class="btn btn-primary btn-large">Uložiť</button>
                    <button class="btn btn-info btn-large"><a href="<?php echo base_url();?>Admin/Lektori">Späť</a></button>
                </div>
            </div>
        </form>
    </div>
</div>