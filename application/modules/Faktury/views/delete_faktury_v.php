<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Faktury/post_delete_faktury" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-12">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Firma:</label>
                        <?php echo $Firma?>
                    </div>
                    <div class ="form-group">
                        <label>IČO:</label>
                        <?php echo $ICO?>
                    </div>
                    <div class ="form-group">
                        <label>DIČ:</label>
                        <?php echo $DIC?>
                    </div>
                    <div class ="form-group">
                        <label>IČ DPH:</label>
                        <?php echo $IC_DPH?>
                    </div>
                    <div class ="form-group">
                        <label>Adresa Firmy:</label>
                        <?php echo $AdresaFirmy?>
                    </div>
                    <div class ="form-group">
                        <label>Účastník:</label>
                        <?php echo $ucastnik?>
                    </div>
                    <div class ="form-group">
                        <label>Kurz:</label>
                        <?php echo $kurz?>
                    </div>
                    <div class ="form-group">
                        <label>Počet hodín:</label>
                        <?php echo $PocetHodin?>
                    </div>
                    <div class ="form-group">
                        <label>Cena Hodiny (€):</label>
                        <?php echo $CenaHodiny?>
                    </div>
                    <div class ="form-group">
                        <label>Celková suma (€):</label>
                        <?php echo $CelkovaSuma?>
                    </div>
                    <div class ="form-group">
                        <label>Zaplatená:</label>
                        <?php echo $Zaplatena?>
                    </div>
                </div>
                <div class ="col-md-12">
                    <button class="btn btn-danger btn-large">Odstrániť</button>
                    <a href="<?php echo base_url();?>Admin/Faktury" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>
