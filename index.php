<?php
require_once 'Builder/TreeBuilder.php';
$data = [
     ['main_1', 'Main Item 1'],
     ['main_2', 'Main Item 2'],
     ['main_3', 'Main Item 3'],
     ['main_1.sub_1', 'Sub Item 1'],
     ['main_1.sub_2', 'Sub Item 2'],
     ['main_2.sub_1', 'Sub Item 1'],
     ['main_2.sub_2', 'Sub Item 2'],
     ['main_3.sub_1', 'Sub Item 1'],
     ['main_3.sub_2', 'Sub Item 2'],
     ['main_1.sub_1.level_3', 'Level 3'],
     ['main_1.sub_2.level_3', 'Level 3'],
     ['main_2.sub_1.level_3', 'Level 3'],
     ['main_2.sub_2.level_3', 'Level 3'],
     ['main_3.sub_1.level_3', 'Level 3'],
     ['main_3.sub_2.level_3', 'Level 3'],
];

$treeBuilder = new TreeBuilder($data);
$subTree = $treeBuilder->buildSubTree();

print_r($subTree);
