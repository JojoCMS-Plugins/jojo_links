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



$table = 'link';
$o = 1;

$default_td[$table]['td_displayfield'] = 'lk_name';
$default_td[$table]['td_rolloverfield'] = 'lk_url';
$default_td[$table]['td_orderbyfields'] = 'lk_order,lk_name';
$default_td[$table]['td_topsubmit'] = 'yes';
$default_td[$table]['td_deleteoption'] = 'yes';
$default_td[$table]['td_menutype'] = 'tree';
$default_td[$table]['td_categoryfield'] = 'lk_categoryid';
$default_td[$table]['td_categorytable'] = 'linkcategory';
$default_td[$table]['td_help'] = 'This section manages outgoing links to other websites. Linking to another website will help their Search Engine Ranking, so it is worth getting the other party to provide a return link to you as well.<br/><br/>Links do need to be checked every so often to ensure they are still active. The URL field will reflect this, with either a tick or cross showing whether the website is online or not.<br/><br/>Try not to have more than 80 links in total on one page as this is the recommended maximum by Google. If more links are required, adjustments to the template can be made so that links are placed over several pages.<br/>';

/* Link ID */
$field = 'linkid';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'readonly';
$default_fd[$table][$field]['fd_help'] = 'A unique ID, automatically assigned by the system';

/* Name */
$field = 'lk_name';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size'] = '40';
$default_fd[$table][$field]['fd_help'] = 'Name of the link - eg www.google.com would be "Google"';

/* URL */
$field = 'lk_url';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'url';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size'] = '40';
$default_fd[$table][$field]['fd_help'] = 'URL for the link. Please include the http://';

/* Description */
$field = 'lk_desc';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'textarea';
$default_fd[$table][$field]['fd_rows'] = '3';
$default_fd[$table][$field]['fd_cols'] = '40';
$default_fd[$table][$field]['fd_help'] = 'A brief description of the link, used to briefly describe the link to the visitor';

/* Image */
$field = 'lk_image';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'fileupload';
$default_fd[$table][$field]['fd_help'] = 'An image or logo representing the link. This feature may not be used on some sites.';

/* Category */
$field = 'lk_categoryid';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'dblist';
$default_fd[$table][$field]['fd_options'] = 'linkcategory';
$default_fd[$table][$field]['fd_help'] = 'Category of the link, if applicable';

/* Phone */
$field = 'lk_phone';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'text';
$default_fd[$table][$field]['fd_size'] = '15';
$default_fd[$table][$field]['fd_help'] = 'Phone number for the organization. This feature is not used on some sites.';

/* Order */
$field = 'lk_order';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_type'] = 'integer';
$default_fd[$table][$field]['fd_help'] = 'Order in which the link appears within it\'s category or on the page';

/* Follow */
$field = 'lk_follow';
$default_fd[$table][$field]['fd_order'] = $o++;
$default_fd[$table][$field]['fd_name'] = 'Robots Follow';
$default_fd[$table][$field]['fd_help'] = "Setting this to NO will prevent Search Engines from following the link. This will prevent loss of PR from your site, but the link will not help their Search Engine Rankings at all. Set this to NO when you want to link to a site, but don't want to help their SEO at your expense.";