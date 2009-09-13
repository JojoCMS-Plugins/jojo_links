<?php

$table = 'link';
$query = "
    CREATE TABLE `link` (
        `linkid` int(11) NOT NULL auto_increment,
        `lk_name` varchar(255) NOT NULL default '',
        `lk_url` varchar(255) NOT NULL default '',
        `lk_desc` text NOT NULL,
        `lk_order` int(11) NOT NULL default '0',
        `lk_image` varchar(255) NOT NULL default '',
        `lk_categoryid` int(11) NOT NULL default '0',
        `lk_phone` varchar(100) NOT NULL default '',
        `lk_follow` ENUM('yes','no') NOT NULL default 'yes',
        PRIMARY KEY  (`linkid`)
        ) TYPE=MyISAM ;";


/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* pageurls is a spammy field we no longer need */
if (Jojo::fieldexists('link','lk_pageurls')) {
    echo "Remove <b>lk_pageurls</b> from <b>link</b><br />";
    Jojo::structureQuery("ALTER TABLE `link` DROP `lk_pageurls` ;");
}

/* hits has never worked properly - remove it */
if (Jojo::fieldexists('link','lk_hits')) {
    echo "Remove <b>lk_hits</b> from <b>link</b><br />";
    Jojo::structureQuery("ALTER TABLE `link` DROP `lk_hits` ;");
}

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