<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>index.php/Admin/addUcastnik" class="btn btn-primary pull-right">Pridať účastníka</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th>#</th>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Adresa</th>
            <th>Email</th>
            <th>Telefon</th>
            </thead>
            <tbody>
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
    </div>
</div>