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
                    <input type="text" name="Kategoria" class="form-control">
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
                    <label>Začiatok kurzu</label>
                    <input type="text" name="Zaciatok" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Koniec kurzu</label>
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
                    <button class="btn btn-success btn-large">Uložiť</button>
                <button class="btn btn-info btn-large"><a href="<?php echo base_url();?>index.php/Admin/Kurzy">Späť</a></button>
            </div>
        </div>
    </div>
    </form>
</div>
