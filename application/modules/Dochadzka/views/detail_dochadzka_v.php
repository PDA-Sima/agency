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
                        <label>Účastník:</label>
                        <?php echo $ucastnik?>
                    </div>
                    <div class ="form-group">
                        <label>Kurz:</label>
                        <?php echo $kurz?>
                    </div>
                    <div class ="form-group">
                        <label>Dátum:</label>
                        <?php echo $Datum?>
                    </div>
                    <div class ="form-group">
                        <label>Zaciatok:</label>
                        <?php echo $Zaciatok?>
                    </div>
                    <div class ="form-group">
                        <label>Koniec:</label>
                        <?php echo $Koniec?>
                    </div>
                </div>

                <div class ="col-md-12">
                    <a href="<?php echo base_url();?>Admin/Dochadzka" class="btn btn">Späť</a>
                </div>
            </div>
        </form>
    </div>
</div>