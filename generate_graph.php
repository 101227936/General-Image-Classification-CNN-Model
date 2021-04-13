<?php
    $accuracy_generate = "accuracy_generate.py";
    $loss_generate = "loss_generate.py";
    $roc_generate = "roc_generate.py";
    $cm_generate = "cm_generate.py";
    $cr_generate = "classification_report_generate.py";
    $accuracy = shell_exec($accuracy_generate);
    $loss = shell_exec($loss_generate);
    $roc = shell_exec($roc_generate);
    $cm = shell_exec($cm_generate);
    $cr = shell_exec($cr_generate);
?>