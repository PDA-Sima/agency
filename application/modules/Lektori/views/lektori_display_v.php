<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addLektor" class="btn btn-primary ">Pridať lektora</a>
        <br><br>
    </div>
</div>

<div id="table_lektori">
<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th class="sort" data-sort="ID">ID</th>
            <th class="sort" data-sort="Lektori">Lektori</th>
            </thead>
            <tbody class="list">
            <?php
            if($lektori_table !== ""){
                echo $lektori_table;
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
valueNames: [ 'ID', 'Lektori' ]
};

var Lektors = new List('table_lektori', options);

</script>