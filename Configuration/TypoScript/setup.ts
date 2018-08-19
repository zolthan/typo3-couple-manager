plugin.tx_couplemanager {
    view {
        templateRootPaths {
            10 = EXT:bootstrap_package/Resources/Private/Templates/ContentElements/
            20 = EXT:couple_manager/Resources/Private/Templates/
            30 = {$plugin.tx_couplemanager.view.templateRootPath}
        }

        partialRootPaths {
            10 = EXT:bootstrap_package/Resources/Private/Partials/ContentElements/
            20 = EXT:couple_manager/Resources/Private/Partials/
            30 = {$plugin.tx_couplemanager.view.partialRootPath}
        }

        layoutRootPaths {
            10 = EXT:bootstrap_package/Resources/Private/Layouts/ContentElements/
            20 = EXT:couple_manager/Resources/Private/Layouts/
            30 = {$plugin.tx_couplemanager.view.layoutRootPath}
        }
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

