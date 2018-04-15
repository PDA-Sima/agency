<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>index.php/Admin/addKurz" class="btn btn-primary pull-right">Pridať kurz</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
        <thead>
            <th>#</th>
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
    </div>
</div>