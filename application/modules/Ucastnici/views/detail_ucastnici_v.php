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
                        <label>Meno účastníka:</label>
                        <?php echo $Meno ?>
                    </div>
                    <div class ="form-group">
                        <label>Adresa:</label>
                        <?php echo $Adresa?>
                    </div>
                    <div class ="form-group">
                        <label>Email:</label>
                        <?php echo $Email?>
                    </div>
                    <div class ="form-group">
                        <label>Telefon:</label>
                        <?php echo $Telefon?>
                    </div>

                </div>

                <div class ="col-md-12">
                    <a href="<?php echo base_url();?>Admin/Ucastnici" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>