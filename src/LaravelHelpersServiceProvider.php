<?php

namespace JGile\LaravelHelpers;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelHelpersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->hasConfigFile();
    }
}
