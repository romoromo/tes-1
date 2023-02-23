<?php if (  !empty($data['template']) ): ?>
<?php include_once $data['template']; ?>	
<?php else: ?>
	no_template
<?php endif ?>