<?php

/**
 * Class FormRecipientMenu
 *
 * Provide methods to handle recipient menus.
 * @copyright  Martin Kozianka 2015 <http://kozianka.de/>
 * @author     Martin Kozianka <http://kozianka.de/>
 * @package    recipientselect
 */
class FormRecipientMenu extends \FormSelectMenu {
    protected $strTemplate = 'form_select_recipient';

    protected function isValidOption($varInput) {
        return true;
    }

}
