<div class="row">
    <div class ="col-md-12">
        <form method ="Post" action = "<?php echo base_url(); ?>Dochadzka/post_edit_dochadzka" enctype="multipart/form-data">
            <div class ="row">
                <div class ="col-md-8">
                    <div class ="form-group">
                        <input type="hidden"  name ="ID" value="<?php echo $id ?>"class ="form-control">
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
                        <label>Dátum</label>
                        <input type="text" name ="Datum" value="<?php echo $Datum ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Začiatok hodiny</label>
                        <input type="text" name ="Zaciatok" value="<?php echo $Zaciatok ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <div class ="form-group">
                        <label>Koniec hodiny</label>
                        <input type="text" name ="Koniec" value="<?php echo $Koniec ?>"class ="form-control">
                    </div>
                </div>
                <div class ="col-md-8">
                    <button class="btn btn-primary btn-large">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Dochadzka" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>