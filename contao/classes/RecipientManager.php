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

        $objFormField = \FormFieldModel::findOneBy(
            array('pid = ?', 'type = ?'),
            array($objForm->id, 'recipientmenu')
        );

        if($objForm->recipientselect == '1' && $objFormField != null) {

            // subject
            $arrSubmitted['subject'] = $this->objFormField->recipient_subject;

            $arrOptions = array();
            $arrTmp     = deserialize($objFormField->options);
            foreach($arrTmp as $entry) {
                $label              = $entry['label'];
                $arrOptions[$label] = $entry['value'];
            }

            $arrRecipients = array();
            if (is_array($arrSubmitted['recipientmenu'])) {
                foreach($arrSubmitted['recipientmenu'] as $entry) {
                    $arrRecipients[] = $arrOptions[$entry];
                }
            }
            elseif (strlen($arrSubmitted['recipientmenu']) > 0) {
                $key             = $arrSubmitted['recipientmenu'];
                $arrRecipients[] = $arrOptions[$key];
            }

            if (count($arrRecipients)=== 0 || $objFormField->recipient_sendCopy == '1') {
                $arrRecipients[] = $objFormField->recipient_defaultEmail;
            }

            $objForm->recipient      = implode(',', $arrRecipients);
            $objForm->sendViaEmail   = '1';
            $objForm->format         = 'email';

        }
    }
}
