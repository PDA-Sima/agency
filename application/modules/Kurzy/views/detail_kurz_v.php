<div class="row">
    <div class ="col-md-12">
        <form enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Názov kurzu:</label>
                        <?php echo $Nazov ?>
                    </div>
                    <div class ="form-group">
                        <label>Popis kurzu:</label>
                        <?php echo $Popis?>
                    </div>
                    <div class ="form-group">
                        <label>Lektor:</label>
                        <?php echo $meno?>
                    </div>
                    <div class ="form-group">
                        <label>Kategoria:</label>
                        <?php echo $kateg?>
                    </div>
                    <div class ="form-group">
                        <label>Miesto konania:</label>
                        <?php echo $MiestoKonania?>
                    </div>
                    <div class ="form-group">
                        <label>Zaciatok:</label>
                        <?php echo $Zaciatok?>
                    </div>
                    <div class ="form-group">
                        <label>Koniec:</label>
                        <?php echo $Koniec?>
                    </div>
                    <div class ="form-group">
                        <label>Určené pre firmy:</label>
                        <?php echo $UrcenePreFirmy?>
                    </div>

                </div>

                <div class ="col-md-12">
                    <a href="<?php echo base_url();?>Admin/Kurzy" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>