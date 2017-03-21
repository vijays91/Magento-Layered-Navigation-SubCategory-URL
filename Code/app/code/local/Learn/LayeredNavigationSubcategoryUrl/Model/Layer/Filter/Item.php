<?php
 /**
 * @category    Learn
 * @package     Learn_LayeredNavigationSubcategoryUrl
 * @author      Vijayakumar
 */
class Learn_LayeredNavigationSubcategoryUrl_Model_Layer_Filter_Item extends Mage_Catalog_Model_Layer_Filter_Item
{

    /**
     * Get filter item url
     *
     * @return string
     */
    public function getUrl()
    {
		$_helper = Mage::helper('layerednavigationsubcategoryurl');
        if($this->getFilter()->getRequestVar() == "cat" && $_helper->ln_subcategory_url_enable()){
            $category_url = Mage::getModel('catalog/category')->load($this->getValue())->getUrl();
            $return = $category_url;
            $request = Mage::getUrl('*/*/*', array('_current'=>true, '_use_rewrite'=>true));
            if(strpos($request,'?') !== false ){
                $query_string = substr($request,strpos($request,'?'));
            }
            else{
                $query_string = '';
            }
            if(!empty($query_string)){
                $return .= $query_string;
            }
            return $return;
        }
        else{
            $query = array(
                $this->getFilter()->getRequestVar()=>$this->getValue(),
                Mage::getBlockSingleton('page/html_pager')->getPageVarName() => null // exclude current page from urls
            );

            return Mage::getUrl('*/*/*', array('_current'=>true, '_use_rewrite'=>true, '_query'=>$query));
        }
    }
}