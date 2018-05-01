<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addFaktura" class="btn btn-primary">Pridať faktúru</a>
        <br><br>
    </div>
</div>

<div id="table_faktury">
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th class="sort" data-sort="ID">ID</th>
            <th class="sort" data-sort="Firma">Firma</th>
            <th class="sort" data-sort="ICO">IČO</th>
            <th class="sort" data-sort="DIC">DIČ</th>
            <th class="sort" data-sort="IC_DPH">IČ_DPH</th>
            <th class="sort" data-sort="Adresa">Adresa</th>
            <th class="sort" data-sort="Ucastnik">Účastník</th>
            <th class="sort" data-sort="Kurz">Kurz</th>
            <th class="sort" data-sort="Hodiny">Počet hodín</th>
            <th class="sort" data-sort="Cena">Cena hodiny</th>
            <th class="sort" data-sort="Suma">Celková suma</th>
            <th class="sort" data-sort="Zaplatena">Zaplatená</th>
            </thead>
            <tbody class="list">
            <?php
            if($faktury_table !== ""){
                echo $faktury_table;
            }
            else{
                ?>
                <tr>
                    <td colspan="9"><center>No data</center></td>
                </tr>
            <?php } ?>
            </tbody class="list">
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</div>

<script src="<?php echo base_url();?>assets/admin/js/list.min.js"></script>
<script type="text/javascript">
    var options = {
        valueNames: [ 'ID', 'Firma', 'ICO', 'DIC', 'IC_DPH', 'Adresa', 'Ucastnik', 'Kurz', 'Hodiny', 'Cena', 'Suma', 'Zaplatena', ]
    };

    var Faktury = new List('table_faktury', options);

</script>