
plugin.tx_couplemanager_couple {
    view {
        # cat=plugin.tx_couplemanager_couple/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:couple_manager/Resources/Private/Templates/
        # cat=plugin.tx_couplemanager_couple/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:couple_manager/Resources/Private/Partials/
        # cat=plugin.tx_couplemanager_couple/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:couple_manager/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_couplemanager_couple//a; type=string; label=Default storage PID
        storagePid =
    }
}
