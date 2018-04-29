<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Kurzy/post_kurz" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Názov kurzu</label>
                    <input type="text" name="Nazov" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Popis kurzu</label>
                    <input type="text" name="Popis" class="form-control">
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

            <div class="col-md-8">
                <div class="form-group">
                    <label>Miesto konania kurzu</label>
                    <input type="text" name="MiestoKonania" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Začiatok kurzu (rok-mesiac-deň)</label>
                    <input type="text" name="Zaciatok" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Koniec kurzu (rok-mesiac-deň)</label>
                    <input type="text" name="Koniec" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Kurz pre firmy</label>
                    <input type="text" name="UrcenePreFirmy" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <button class="btn btn-primary btn-large">Uložiť</button>
                <a href="<?php echo base_url();?>Admin/Kurzy" class="btn btn">Späť</a>
            </div>
        </div>
    </div>
    </form>
</div>
