<?php
/*====
The footer file.  For TJMBase, the actual footer is part of 'skeleton.php'.  This ends the 'main' buffer so that it doesn't have to be done manually, then renders the whole page from buffers.  This allows buffers to be used while still using common WordPress practices of calling get_header() at the top of a page file and get_footer() at the bottom.
=====*/

global $tjmThemeHelper;

$tjmThemeHelper->buffers->end('main');
echo $tjmThemeHelper->renderer->render('skeleton.php');
