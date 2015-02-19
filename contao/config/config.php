<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
 *
 *
 * PHP version 5
 * @copyright  Martin Kozianka 2015 <http://kozianka.de/>
 * @author     Martin Kozianka <http://kozianka.de/>
 * @package    recipientselect
 * @license    LGPL 
 * @filesource
 */

$GLOBALS['TL_FFL']['recipientmenu'] = 'FormRecipientMenu';

$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('RecipientManager', 'prepareRecipients');


