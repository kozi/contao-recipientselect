<?php

ClassLoader::addClasses(array(
    'FormRecipientMenu'  => 'system/modules/recipientselect/widgets/FormRecipientMenu.php',
    'RecipientManager'   => 'system/modules/recipientselect/classes/RecipientManager.php'
));

TemplateLoader::addFiles(array
(
    'form_select_recipient'    => 'system/modules/recipientselect/templates',
));
