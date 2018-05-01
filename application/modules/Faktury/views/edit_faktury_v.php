<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Faktury/post_edit_faktury" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-8">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Firma</label>
                        <input type="text" name ="Firma" value="<?php echo $Firma ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>IČO</label>
                        <input type="text" name ="ICO" value="<?php echo $ICO ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>DIČ</label>
                        <input type="text" name ="DIC" value="<?php echo $DIC ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>IČ DPH</label>
                        <input type="text" name ="IC_DPH" value="<?php echo $IC_DPH ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Adresa firmy</label>
                        <input type="text" name ="AdresaFirmy" value="<?php echo $AdresaFirmy ?>"class ="form-control">
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
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Počet hodín</label>
                        <input type="text" name ="PocetHodin" value="<?php echo $PocetHodin ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Cena hodiny (€)</label>
                        <input type="text" name ="CenaHodiny" value="<?php echo $CenaHodiny ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Celková suma (€)</label>
                        <input type="text" name ="CelkovaSuma" value="<?php echo $CelkovaSuma ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Zaplatená</label>
                        <input type="text" name ="Zaplatena" value="<?php echo $Zaplatena ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <button class="btn btn-primary btn-large btn-fill">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Faktury" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>