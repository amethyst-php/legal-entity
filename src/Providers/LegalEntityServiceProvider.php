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

        Config::set('amethyst.taxonomy.data.taxonomy.seeds', array_merge(
            Config::get('amethyst.taxonomy.data.taxonomy.seeds'),
            Config::get('amethyst.legal-entity.taxonomies')
        ));
    }
}
