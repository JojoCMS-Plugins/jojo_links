<?php

$table = 'linkcategory';
$query = "
    CREATE TABLE `linkcategory` (
        `linkcategoryid` int(11) NOT NULL auto_increment,
        `lc_name` varchar(255) NOT NULL default '',
        `lc_desc` text NOT NULL,
        `lc_order` int(11) NOT NULL default '0',
        `lc_image` varchar(255) NOT NULL default '',
        PRIMARY KEY  (`linkcategoryid`)
        ) TYPE=MyISAM ;";

/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jojo_links: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jojo_links: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table,$result['different']);