#!/bin/bash
#
# optimize the ac_core.src.js to the ac_core.js

/usr/bin/yui-compressor --type=js -o ac_core.js --nomunge ac_core.src.js
/usr/bin/yui-compressor --type=js -o jquery-ui-autocomplete.min.js --nomunge jquery-ui-autocomplete.js
exit 0
