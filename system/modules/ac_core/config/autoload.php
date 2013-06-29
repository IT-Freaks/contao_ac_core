<?php

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'AcCoreAjax'              => 'system/modules/ac_core/AcCoreAjax.php',
	'AutoCompleter'           => 'system/modules/ac_core/AutoCompleter.php',
	'MootoolsAutoCompleter'   => 'system/modules/ac_core/MootoolsAutoCompleter.php',
	'JqueryAutoCompleter'     => 'system/modules/ac_core/JqueryAutoCompleter.php'
));

TemplateLoader::addFiles(array
(
	'jquery_autocompleter' => 'system/modules/ac_core/templates',
	'mootools_autocompleter' => 'system/modules/ac_core/templates',
));