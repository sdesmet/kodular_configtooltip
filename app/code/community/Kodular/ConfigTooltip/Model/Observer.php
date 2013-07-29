<?php
/**
 * 
 * @author Steve Desmet <steve.desmet@gmail.com>
 *
 */
class Kodular_ConfigTooltip_Model_Observer
{

    /**
     * Observes the "adminhtml_init_system_config" event which fires after all 
     * module system.xml has been loaded
     * 
     * Method adds a <tooltip> containing the full path <section>/<group>/<field> 
     * as it will be saved in the path column of the core_config_data table
     * 
     * @param Varien_Event_Observer $observer
     */
    public function adminHtmlInitSystemConfig(Varien_Event_Observer $observer)
    {
        $action = Mage::app()->getFrontController()->getAction()->getFullActionName();
        if ($action === 'adminhtml_system_config_edit') {
            if ($section = Mage::app()->getRequest()->getParam('section', false)) {
                $config = $observer->getEvent()->getConfig();
                foreach ($config->getNode()->xpath("sections/{$section}/groups/*/fields/*") as $field) {
                    $path = array();
                    $path[] = $section;
                    $path[] = $field->getParent()->getParent()->getName();
                    $path[] = $field->getName();
                    $field->addChild('tooltip', implode('/', $path));
                }
            }
        }
    }

}