<?php

require_once __DIR__ . '/Meteoroid.php';

$meteoroid = new Meteoroid('Hoba');
$meteoroid->addElement('Iron', 45712);
$meteoroid->addElement('Nickel', 8707);
$meteoroid->addElement('Cobalt', 55);

?>

<table>
    <thead>
        <tr>
            <th>Iron</th>
            <th>Nickel</th>
            <th>Cobalt</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $meteoroid['Iron'] ?></td>
            <td><?php echo $meteoroid['Nickel'] ?></td>
            <td><?php echo $meteoroid['Cobalt'] ?></td>
        </tr>
    </tbody>
</table>