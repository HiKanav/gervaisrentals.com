<?php

Html::macro('form_field', function($description, $input)
{
    return <<<EOT
	    <div class="form-group">
	        <label class="col-md-3 control-label">$description</label>
	        <div class="col-md-4">
	        	$input
	        </div>
	    </div>
EOT;
});