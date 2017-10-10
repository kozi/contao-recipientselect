<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2017 Leo Feyer
 *
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2015-2017 <http://kozianka.de/>
 * @author     Martin Kozianka <http://kozianka.de/>
 * @package    recipientselect
 * @license    LGPL 
 * @filesource
 */

$GLOBALS['TL_FFL']['recipientmenu'] = 'FormRecipientMenu';

$methodName = (version_compare(VERSION, "4", ">=")) ? 'prepareRecipients': 'prepareRecipients3';
$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('RecipientManager', $methodName);
