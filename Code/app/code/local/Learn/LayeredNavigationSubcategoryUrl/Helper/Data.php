<?php
 /**
 * @category    Learn
 * @package     Learn_LayeredNavigationSubcategoryUrl
 * @author      Vijayakumar
 */
class Learn_LayeredNavigationSubcategoryUrl_Helper_Data extends Mage_Core_Helper_Abstract {
	
	const XML_PATH_LN_SUBCATEGORY_URL_ACTIVE = 'layerednavigationsubcategoryurl/settings/active';	
	
	private function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function ln_subcategory_url_enable($store = null) {
		return $this->conf(self::XML_PATH_LN_SUBCATEGORY_URL_ACTIVE, $store);
	}
}