<center>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Staff / Date</th>
            <?php foreach ($dates as $d): ?>
                <th><small><center><b><?= date('d/m/Y',strtotime($d['date'])) ?><br><?php echo date('l', strtotime($d['date'])); ?></b></center></small></th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($staff_rows as $row): ?>

            <?php
                // 🔴 CHECK: All values are '-' ?
                $hasTiming = false;
                foreach ($row['dates'] as $time) {
                    if ($time !== '-') {
                        $hasTiming = true;
                        break;
                    }
                }

                // Skip row if no timing at all
                if (!$hasTiming) {
                    continue;
                }
            ?>
            <tr>
                <td><small><b><?php echo $row['name'] ?? ''; ?></b></small></td>

                <?php foreach ($dates as $d): ?>
                    <td style="text-align:center;">
                        <small><?= $row['dates'][$d['date']] ?? ''; ?></small>
                    </td>
                <?php endforeach; ?>

            </tr>
        <?php endforeach; ?>
    </table>
</center>
