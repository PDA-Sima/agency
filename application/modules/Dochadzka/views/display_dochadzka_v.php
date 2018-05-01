<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addDochadzka" class="btn btn-primary btn-fill">Pridať dochádzku</a>
        <br><br>
    </div>
</div>

<div id="table_dochadzka">
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th class="sort" data-sort="ID">ID</th>
            <th class="sort" data-sort="Ucastnik">Účastník</th>
            <th class="sort" data-sort="Kurz">Kurz</th>
            <th class="sort" data-sort="Datum">Dátum</th>
            <th class="sort" data-sort="Zaciatok">Začiatok</th>
            <th class="sort" data-sort="Koniec">Koniec</th>
            </thead>
            <tbody class="list">
            <?php
            if($dochadzka_table !== ""){
                echo $dochadzka_table;
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
        valueNames: [ 'ID', 'Ucastnik', 'Kurz', 'Lektor', 'Datum', 'Zaciatok', 'Koniec']
    };

    var Dochadzka = new List('table_dochadzka', options);

</script>