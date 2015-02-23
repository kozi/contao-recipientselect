<?php

$this->loadLanguageFile('tl_form');

$GLOBALS['TL_DCA']['tl_form_field']['list']['sorting']['headerFields'][] = 'recipientselect';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['recipientmenu'] = str_replace(
    '{options_legend}',
    '{recipient_legend},recipient_subject,recipient_defaultEmail, recipient_sendCopy;{options_legend}',
    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['recipient_subject']     = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form']['subject'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'long'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['recipient_defaultEmail'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['recipient_defaultEmail'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>1022, 'rgxp'=>'emails', 'tl_class'=>'w50'),
    'sql'                     => "varchar(1022) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_form_field']['fields']['recipient_sendCopy'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['recipient_sendCopy'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'sql'                     => "char(1) NOT NULL default ''",
    'eval'                    => array('tl_class'=>'w50 m12'),
);


$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = function(DataContainer $dc) {
    $objFormField = \FormFieldModel::findByPk($dc->id);
    if ($objFormField->type == 'recipientmenu') {


        // Name ist nicht veränderbar
        $objFormField->name      = 'recipientmenu';
        $objFormField->save();

        $GLOBALS['TL_DCA']['tl_form_field']['fields']['name']['eval']['readonly']      = true;

        $GLOBALS['TL_LANG']['tl_form_field']['options_legend'] = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['options_legend'];
        $GLOBALS['TL_LANG']['tl_form_field']['options']        = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['options'];
        $GLOBALS['TL_LANG']['MSC']['ow_value']                 = $GLOBALS['TL_LANG']['tl_form_field']['recipientmenu']['ow_value'];

    }

};



