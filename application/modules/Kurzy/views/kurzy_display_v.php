<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>index.php/Admin/addKurz" class="btn btn-primary">Pridať kurz</a>
        <br><br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
        <thead>
            <th>ID</th>
            <th>Názov</th>
            <th>Popis</th>
            <th>Lektor</th>
            <th>Kategória</th>
            <th>Miesto konania</th>
            <th>Začiatok</th>
            <th>Koniec</th>
            <th>Pre firmy</th>
        </thead>
        <tbody>
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

<script src="<?php echo base_url();?>assets/admin/js/list.min.js"></script>
<script type="text/javascript">
    var options = {
        valueNames: [ 'ID', 'Lektori' ]
    };

    var Lektors = new List('table_lektori', options);

</script>