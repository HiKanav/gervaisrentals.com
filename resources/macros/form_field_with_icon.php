<?php

Html::macro('form_field_with_icon', function($icon, $input)
{
    return <<<EOT
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-$icon" aria-hidden="true"></i>
                </span>
                $input
            </div>
        </div>
EOT;
});