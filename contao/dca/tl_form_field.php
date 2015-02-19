<?php
$GLOBALS['TL_DCA']['tl_form_field']['list']['sorting']['headerFields'][] = 'recipientselect';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['recipientmenu'] = $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select'];

$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = function(DataContainer $dc) {
    $objFormField = \FormFieldModel::findByPk($dc->id);
    if ($objFormField->type == 'recipientmenu') {


        // Name und die Option Pflichtfeld sind nicht veränderbar
        $objFormField->name      = 'recipientmenu';
        $objFormField->mandatory = '1';
        $objFormField->save();

        $GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['readonly']      = true;
        $GLOBALS['TL_DCA']['tl_form_field']['fields']['mandatory']['eval']['disabled'] = true;

        $GLOBALS['TL_LANG']['tl_form_field']['options_legend'] = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['options_legend'];
        $GLOBALS['TL_LANG']['tl_form_field']['options']        = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['options'];
        $GLOBALS['TL_LANG']['MSC']['ow_value']                 = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['ow_value'];

    }

};



