<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Ucastnici/post_ucastnici" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Meno účastníka:</label>
                        <input type="text" name="Meno" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pruezvisko účastníka:</label>
                        <input type="text" name="Priezvisko" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Adresa:</label>
                        <input type="text" name="Adresa" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telefon:</label>
                        <input type="text" name="Telefon" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary btn-large">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Ucastnici" class="btn btn">Späť</a>
                </div>
            </div>
    </div>
    </form>
</div>