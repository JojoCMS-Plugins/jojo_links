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


class JOJO_Plugin_Jojo_links extends JOJO_Plugin
{

    function _getContent()
    {
        global  $smarty;
        $content = array();

        if (Jojo::tableexists('linkcategory'))  {
            $linkcategorys = Jojo::selectQuery("SELECT * FROM linkcategory, link WHERE lk_categoryid=linkcategoryid GROUP BY linkcategoryid ORDER BY lc_order, lc_name"); //the join strips out categories with no links
            $smarty->assign('linkcategorys', $linkcategorys);
        }

        $links = Jojo::selectQuery("SELECT * FROM link WHERE 1 ORDER BY lk_order, lk_name");
        /* ensure images aren't broken */
        $n = count($links);
        for ($i=0;$i<$n;$i++) {
            if (!Jojo::fileExists(_DOWNLOADDIR.'/links/'.$links[$i]['lk_image'])) {
                $links[$i]['lk_image'] = '';
            }
        }
        $smarty->assign('links', $links);

        $thumbsize = 120;

        $smarty->assign('content', $this->page['pg_body']);

        $content['content'] = $smarty->fetch('jojo_links.tpl');

        return $content;
    }
}