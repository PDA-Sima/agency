<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Ucastnici/post_delete_ucastnik" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-12">
                    <div class ="form-group">
                        <label>Meno:</label>
                        <?php echo $meno ?><br>
                        <label>Priezvisko:</label>
                        <?php echo $priezvisko ?><br>
                        <label>Adresa:</label>
                        <?php echo $adresa ?><br>
                        <label>Email:</label>
                        <?php echo $email ?><br>
                        <label>Telefón:</label>
                        <?php echo $telefon ?><br>
                    </div>
                </div>

                <div class ="col-md-12">
                    <button class="btn btn-danger btn-large">Odstrániť</button>
                    <a href="<?php echo base_url();?>Admin/Ucastnici" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>