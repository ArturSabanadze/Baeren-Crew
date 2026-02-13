<?php

function towerOfHanoi($n, $fromRod, $toRod, $auxRod) {
    if ($n == 0) {
        return; // no disks to move
    }

    // Move n-1 disks from source to auxiliary
    towerOfHanoi($n - 1, $fromRod, $auxRod, $toRod);

    // Move the nth disk from source to target
    echo "Move disk $n from $fromRod to $toRod\n";

    // Move the n-1 disks from auxiliary to target
    towerOfHanoi($n - 1, $auxRod, $toRod, $fromRod);
}

// Example: Solve for 3 disks
$disks = 3;
towerOfHanoi($disks, 'A', 'C', 'B');
printf("Total moves required: %d\n", pow(2, $disks) - 1);
?>
