<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url();?>Lektori/post_lektor" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Meno lektora:</label>
                        <input type="text" name="Lektor" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-success btn-large">Uložiť</button>
                    <button class="btn btn-info btn-large"><a href="<?php echo base_url();?>Admin/Lektori">Späť</a></button>
                </div>
            </div>
    </div>
    </form>
</div>