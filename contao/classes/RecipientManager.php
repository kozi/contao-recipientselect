<?php

/**
 * Class RecipientManager
 *
 * @copyright  Martin Kozianka 2015-2017
 * @author     Martin Kozianka <http://kozianka.de>
 * @package    recipientselect
 */

class RecipientManager extends \System {

    public function prepareRecipients3(&$arrSubmitted, $arrLabels, &$objForm, $arrFields) {
        $this->prepareRecipients($arrSubmitted, $arrLabels, $arrFields, $objForm);
    }

    public function prepareRecipients(&$arrSubmitted, $arrLabels, $arrFields, &$objForm) {

        $objFormField = \FormFieldModel::findOneBy(
            array('pid = ?', 'type = ?'),
            array($objForm->id, 'recipientmenu')
        );

        if($objForm->recipientselect == '1' && $objFormField != null) {

            // subject
            $objForm->subject = $objFormField->recipient_subject;


            // get email definitions
            $arrOptions = array();
            $arrTmp     = deserialize($objFormField->options);
            foreach($arrTmp as $entry) {
                $label              = $entry['label'];
                $arrOptions[$label] = $entry['value'];
            }


            // add emails to recipient array
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

            // add default recipient
            if (count($arrRecipients)=== 0 || $objFormField->recipient_sendCopy == '1') {
                $arrRecipients[] = $objFormField->recipient_defaultEmail;
            }

            $objForm->recipient      = implode(',', $arrRecipients);
            $objForm->sendViaEmail   = '1';
        }
    }
}
