<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Faktury/post_faktury" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Firma</label>
                        <input type="text" name="Firma" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>IČO</label>
                        <input type="text" name="ICO" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>DIČ</label>
                        <input type="text" name="DIC" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>IČ DPH</label>
                        <input type="text" name="IC_DPH" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Adresa firmy</label>
                        <input type="text" name="AdresaFirmy" class="form-control">
                    </div>
                </div>
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
                        <label>Počet hodín</label>
                        <input type="text" name="PocetHodin" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Cena hodiny</label>
                        <input type="text" name="CenaHodiny" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Celková suma</label>
                        <input type="text" name="CelkovaSuma" class="form-control">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Zaplatená</label>
                        <input type="text" name="Zaplatena" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary btn-large btn-fill">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Faktury" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
    </div>
    </form>
</div>
