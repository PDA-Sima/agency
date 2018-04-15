<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>index.php/Admin/addDochadzka" class="btn btn-primary pull-right">+</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th>#</th>
            <th>idKurzu</th>
            <th>idÚčastníka</th>
            <th>Dátum</th>
            <th>Začiatok</th>
            <th>Koniec</th>
            </thead>
            <tbody>
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
    </div>
</div>