<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Dochadzka/post_dochadzka" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Účastník</label>
                        <select name="idUcastnika" class="form-control select2 multiple">
                            <?php echo $ucastnicis ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>Kurz</label>
                        <select name="idKurzu" class="form-control select2 multiple">
                            <?php echo $kurzys ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>Dátum (rok-mesiac-deň)</label>
                        <input type="text" name="Datum" class="form-control">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>Začiatok (h:m:s)</label>
                        <input type="text" name="Zaciatok" class="form-control">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>Koniec (h:m:s)</label>
                        <input type="text" name="Koniec" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary btn-large">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Dochadzka" class="btn btn">Späť</a>
                </div>
            </div>
    </div>
    </form>
</div>
