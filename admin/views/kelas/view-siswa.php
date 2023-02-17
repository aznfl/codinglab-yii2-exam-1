<?php

use yii\widgets\DetailView;

?>
<div class="siswa-view">
    <h1>Daftar Siswa</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>NIS</th>
                <th>NAMA</th>
            </tr>

            <?php
            foreach ($model as $value) {
            ?>
            <tr>

                <td><?= $value->nis ?></td>
                <td><?= $value->nama ?></td>
            </tr>

            <?php
            }
            ?>
        </table>
    </div>

</div>