<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Common\CommonServiceProvider;

class LegalEntityServiceProvider extends CommonServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Railken\Amethyst\Providers\AddressServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\TaxonomyServiceProvider::class);

        Config::push('amethyst.taxonomy.data.taxonomy.seeds', ['name' => Config::get('amethyst.legal-entity.data.legal-entity.taxonomy')]);
        Config::push('amethyst.taxonomy.data.taxonomy.seeds', ['name' => Config::get('amethyst.legal-entity.data.legal-entity-contact.taxonomy')]);
    }
}
