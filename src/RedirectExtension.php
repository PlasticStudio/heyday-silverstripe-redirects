<?php

namespace Heyday\SilverStripeRedirects\Source;

use SilverStripe\Core\Extension;

class RedirectExtension extends Extension
{
    public function onAfterDelete()
    {
        $redirects = RedirectUrl::get()->filterAny([
            'FromRelationID' => $this->owner->ID,
            'ToRelationID' => $this->owner->ID
        ]);

        foreach ($redirects as $redirect) {
            $redirect->delete();
        }
    }
}
