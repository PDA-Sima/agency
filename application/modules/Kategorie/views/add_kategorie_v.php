<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Kategorie/post_kategorie" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Názov kategórie:</label>
                        <input type="text" name="Kategoria" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary btn-large btn-fill">Uložiť</button>
                    <a href="<?php echo base_url();?>Admin/Kategorie" class="btn btn btn-fill">Späť</a>
                </div>
            </div>
    </div>
    </form>
</div>