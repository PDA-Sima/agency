<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Kurzy/post_edit_kurzy" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-8">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Názov kurzu</label>
                        <input type="text" name ="Nazov" value="<?php echo $Nazov ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Popis kurzu</label>
                        <input type="text" name ="Popis" value="<?php echo $Popis ?>"class ="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Lektor kurzu</label>
                        <select name="idLektora" class="form-control select2 multiple">
                            <?php echo $lektors ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Kategória kurzu</label>
                        <select name="idKategorie" class="form-control select2 multiple">
                            <?php echo $kategors ?>
                        </select>
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Miesto konania</label>
                        <input type="text" name ="MiestoKonania" value="<?php echo $MiestoKonania ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Začiatok kurzu</label>
                        <input type="text" name ="Zaciatok" value="<?php echo $Zaciatok ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Koniec kurzu</label>
                        <input type="text" name ="Koniec" value="<?php echo $Koniec ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Určené pre firmy</label>
                        <input type="text" name ="UrcenePreFirmy" value="<?php echo $UrcenePreFirmy ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <button class="btn btn-primary btn-large btn-fill">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Kurzy" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>