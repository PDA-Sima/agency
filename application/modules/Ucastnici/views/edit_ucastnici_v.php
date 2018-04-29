<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Ucastnici/post_edit_ucastnici" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Meno účastníka</label>
                        <input type="text" name ="Meno" value="<?php echo $Meno ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Adresa</label>
                        <input type="text" name ="Adresa" value="<?php echo $Adresa ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Email</label>
                        <input type="text" name ="Email" value="<?php echo $Email ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Telefon</label>
                        <input type="text" name ="Telefon" value="<?php echo $Telefon ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <button class="btn btn-primary btn-large">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Ucastnici" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>