<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

/* Add links page to main menu */
Jojo::updateQuery("UPDATE {page} SET pg_link='Jojo_Plugin_Jojo_links' WHERE pg_link='jojo_links.php'");
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_link='Jojo_Plugin_Jojo_links'");
if (!count($data)) {
    echo "Adding <b>Links</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Links', pg_link='Jojo_Plugin_Jojo_links', pg_url='links', pg_mainnav='yes', pg_breadcrumbnav='yes', pg_footernav='no', pg_sitemapnav='yes', pg_xmlsitemapnav='yes'");
}

/* add Edit Links page in admin section */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/link'");
if (!count($data)) {
    echo "Adding <b>Edit Links</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Edit Links', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/link', pg_parent=?, pg_order=3", array($_ADMIN_CONTENT_ID));
}

/* add Edit Link Categories page in admin section */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/linkcategory'");
if (!count($data)) {
    echo "Adding <b>Edit Link Categories</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Link Categories', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/linkcategory', pg_parent=?, pg_order=4", array($_ADMIN_CONTENT_ID));
}

/* if there are no links, add a link to Jojo to get the ball rolling */
$data = Jojo::selectQuery("SELECT * FROM {link}");
if (!count($data)) {
    Jojo::insertQuery("INSERT INTO {link} SET lk_name='Jojo CMS', lk_url='http://www.jojocms.org', lk_desc='A professional Content management solution for modern websites.'");
}