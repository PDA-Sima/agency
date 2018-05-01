<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>/Admin/addKurz" class="btn btn-primary btn-fill">Pridať kurz</a>
        <br><br>
    </div>
</div>

<div id="table_kurzy">
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
        <thead>
            <th class="sort" data-sort="ID">ID</th>
            <th class="sort" data-sort="Nazov">Názov</th>
            <th class="sort" data-sort="Popis">Popis</th>
            <th class="sort" data-sort="Lektor">Lektor</th>
            <th class="sort" data-sort="Kategoria">Kategória</th>
            <th class="sort" data-sort="MiestoKonania">Miesto konania</th>
            <th class="sort" data-sort="Zaciatok">Začiatok</th>
            <th class="sort" data-sort="Koniec">Koniec</th>
            <th class="sort" data-sort="UrcenePreFirmy">Pre firmy</th>
        </thead>
        <tbody class="list">
            <?php
                if($kurzy_table !== ""){
                echo $kurzy_table;
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
        valueNames: [ 'ID', 'Nazov', 'Popis', 'Lektor', 'Kategoria', 'MiestoKonania', 'Zaciatok', 'Koniec', 'UrcenePreFirmy' ]
    };

    var Kurzy = new List('table_kurzy', options);

</script>