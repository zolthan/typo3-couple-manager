plugin.tx_couplemanager {
    view {
        templateRootPaths.0 = EXT:couple_manager/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_couplemanager.view.templateRootPath}
        partialRootPaths.0 = EXT:couple_manager/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_couplemanager.view.partialRootPath}
        layoutRootPaths.0 = EXT:couple_manager/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_couplemanager.view.layoutRootPath}
    }

    persistence {
        storagePid = {$plugin.tx_couplemanager.persistence.storagePid}
        #recursive = 1
    }

    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }

    mvc {
        callDefaultActionIfActionCantBeResolved = 1
    }
}

