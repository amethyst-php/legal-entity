<?php

namespace Amethyst\Providers;

use Amethyst\Common\CommonServiceProvider;
use Illuminate\Support\Facades\Config;

class LegalEntityServiceProvider extends CommonServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Amethyst\Providers\AddressServiceProvider::class);
        $this->app->register(\Amethyst\Providers\TaxonomyServiceProvider::class);

        Config::set('amethyst.taxonomy.data.taxonomy.seeds', array_merge(
            Config::get('amethyst.taxonomy.data.taxonomy.seeds'),
            Config::get('amethyst.legal-entity.taxonomies')
        ));
    }
}
