<?php

/**
 * Class RecipientManager
 *
 * @copyright  Martin Kozianka 2015
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    recipientselect
 */

class RecipientManager extends \System {

    public function prepareRecipients($arrSubmitted, $arrLabels, $objForm) {

        if($objForm->recipientselect == '1') {

            if (is_array($arrSubmitted['recipientmenu'])) {
                $recipients = implode(',', $arrSubmitted['recipientmenu']);
            }
            else {
                $recipients = $arrSubmitted['recipientmenu'];
            }

            $objForm->recipient    = $recipients;
            $objForm->sendViaEmail = '1';
        }
    }
}
