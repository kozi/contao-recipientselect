<?php


$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace(
    'sendViaEmail',
    'recipientselect,sendViaEmail',
    $GLOBALS['TL_DCA']['tl_form']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_form']['fields']['recipientselect'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form']['recipientselect'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_form']['config']['onload_callback'][] = function(DataContainer $dc) {

    $objForm = \FormModel::findByPk($dc->id);
    if ($objForm->recipientselect == '1') {

        $objForm->sendViaEmail = '';
        $objForm->save();

        $GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace(
            ',sendViaEmail',
            '',
            $GLOBALS['TL_DCA']['tl_form']['palettes']['default']
        );
    }

    if ($objForm->sendViaEmail == '1') {
        $objForm->recipientselect = '';
        $objForm->save();
    }
};

