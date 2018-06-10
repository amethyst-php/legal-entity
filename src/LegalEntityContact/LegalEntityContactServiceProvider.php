<?php

namespace Railken\LaraOre\LegalEntityContact;

use Illuminate\Support\ServiceProvider;

class LegalEntityContactServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        LegalEntityContact::observe(LegalEntityContactObserver::class);
    }
}
