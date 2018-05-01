<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addKategorie" class="btn btn-primary btn-fill">Pridať kategóriu</a>
        <br><br>
    </div>
</div>

<div id="table_kategorie">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped table-bordered">
                <thead>
                <th class="sort" data-sort="ID">ID</th>
                <th class="sort" data-sort="Kategoria">Kategórie</th>
                </thead>
                <tbody class="list">
                <?php
                if($kategorie_table !== ""){
                    echo $kategorie_table;
                }
                else{
                    ?>
                    <tr>
                        <td colspan="9"><center>No data</center></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/admin/js/list.min.js"></script>
<script type="text/javascript">
    var options = {
        valueNames: [ 'ID', 'Kategoria' ]
    };

    var Kategor = new List('table_kategorie', options);
</script>