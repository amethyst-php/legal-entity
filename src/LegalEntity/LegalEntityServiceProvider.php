<?php

namespace Railken\LaraOre\LegalEntity;

use Illuminate\Support\ServiceProvider;

class LegalEntityServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        LegalEntity::observe(LegalEntityObserver::class);
    }
}
