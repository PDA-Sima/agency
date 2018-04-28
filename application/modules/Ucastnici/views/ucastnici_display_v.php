<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>index.php/Admin/addUcastnik" class="btn btn-primary">Pridať účastníka</a>
        <br><br>
    </div>
</div>

<div id="table_ucastnici">
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th class="sort" data-sort="ID">ID</th>
            <th class="sort" data-sort="Meno">Meno</th>
            <th class="sort" data-sort="Priezvisko">Priezvisko</th>
            <th class="sort" data-sort="Adresa">Adresa</th>
            <th class="sort" data-sort="Email">Email</th>
            <th class="sort" data-sort="Telefon">Telefon</th>
            </thead>
            <tbody class="list">
            <?php
            if($ucastnici_table !== ""){
                echo $ucastnici_table;
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
        valueNames: [ 'ID', 'Meno', 'Priezvisko', 'Adresa', 'Email', 'Telefon' ]
    };

    var Ucastnici = new List('table_ucastnici', options);

</script>