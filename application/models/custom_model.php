<?php

class custom_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('my_db');
  }
   
   public function getRateList()
   {
    $SQL = "SELECT *
            FROM `tbl_order_size_difference_rate`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getRate($editOrderID)
   {
    $SQL = "SELECT *
            FROM `tbl_order_size_difference_rate` where orderID=$editOrderID order by orderID ASC";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getRateProduct($editOrderID)
   {
    $SQL = "SELECT A.`orderID`, A.`sizeDiffID`, A.`productID`, A.`sizeDiffRate`, A.`basicRate`, B.`productName` FROM `tbl_order_size_difference_rate` A JOIN `tbl_product_master` B ON A.`productID`=B.`productID` where A.orderID=$editOrderID order by orderID ASC";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function updateRate($sizeDiffID,$sizeDiffRate/*,$basicRate,$productID*/){
    $query = $this->db->query("UPDATE tbl_order_size_difference_rate SET /*productID = '$productID' ,*/ sizeDiffRate = '$sizeDiffRate'/*, basicRate='$basicRate'*/ WHERE sizeDiffID = '$sizeDiffID'");
  }

  public function insertRate($data)
  {
    $table_name="tbl_order_size_difference_rate";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function getDispatch($editRateID)
  {
    $SQL = "SELECT *
            FROM `tbl_order_dispatched` where orderID=$editRateID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function getDispatchProduct($editRateID)
  {
    $SQL = "SELECT A.`dispatchedID`, A.`orderID`, A.`productID`, A.`dispatchedQuantity`, A.`remainingQuantity`, B.`productName` FROM `tbl_order_dispatched` A JOIN `tbl_product_master` B ON A.`productID`=B.`productID` where A.`orderID`=$editRateID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function insertDispatch($data)
  {
    $table_name="tbl_order_dispatched";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function updateDispatch($dispatchedId/*,$productID*/,$dispatchedQuantity/*,$remainingQuantity*/){
    $query = $this->db->query("UPDATE tbl_order_dispatched SET dispatchedQuantity = '$dispatchedQuantity', dispatchedDate=now() /*, remainingQuantity='remainingQuantity' */WHERE dispatchedId = '$dispatchedId'");
  }
  
  public function updateProductionProductTarget($m2productID,$productID,$quantityTarget){
    $query = $this->db->query("UPDATE tbl_manufacture_to_product SET /*productID = '$productID' ,*/ quantityTarget = '$quantityTarget'  WHERE m2productID = '$m2productID'");
  }

  public function updateProductionProductProd($m2productID,$productID,$quantityProduced){
    $query = $this->db->query("UPDATE tbl_manufacture_to_product SET /*productID = '$productID' ,*/ quantityProduced = '$quantityProduced'  WHERE m2productID = '$m2productID'");
  }

  public function getLimit($adminID)
  {
    $SQL = "SELECT A.adminName as adminName , B.orderStockLimit as orderStockLimit
            FROM `tbl_admin` A , `tbl_salesman_limits` B where A.adminID=$adminID and B.adminID=$adminID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function updateLimit($data,$where)
  {
     $table_name = "tbl_salesman_limits";
    return $this->db->update($table_name, $data, $where);
  }

  public function insertLimit($data)
  {
    $table_name="tbl_salesman_limits";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

   public function getProductList()
   {
    $SQL = "SELECT *
            FROM `tbl_product_master`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getProduct($editProductID)
   {
    $SQL = "SELECT *
            FROM `tbl_product_master` where productID=$editProductID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function updateProduct($data,$where)
  {
     $table_name = "tbl_product_master";
    return $this->db->update($table_name, $data, $where);
  }

  public function insertProduct($data)
  {
    $table_name="tbl_product_master";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function updateOrderProduct(/*$productID,*/$quantity,$orderToProID){
    $query = $this->db->query("UPDATE tbl_order_to_product SET  percantageOfOrder = '$quantity' WHERE orderToProID = '$orderToProID'");
  }

  public function getOrderProduct($editOrderID){
    $SQL = "SELECT *
            FROM `tbl_order_to_product` where orderID=$editOrderID order by orderID ASC";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function getOrderProductName($editOrderID){
    $SQL = "SELECT A.`orderToProID`, A.`orderID`, A.`productID`, A.`percantageOfOrder`, B.`productName` FROM `tbl_order_to_product` A JOIN `tbl_product_master` B ON A.`productID`=B.`productID` where orderID=$editOrderID order by orderID ASC";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function getPricingList()
   {
    $SQL = "SELECT *
            FROM `tbl_order_pricing`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getLocationList($adminID)
   {
    $SQL = "SELECT A.adminName employeeName, B.locationID locationID, B.latitude latitude, B.longitude longitude, B.time time FROM `tbl_location` B, `tbl_admin` A WHERE A.adminID=B.adminID and A.adminID=$adminID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getAccess(){
    $SQL = "SELECT `access`
            FROM `tbl_access`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function setAccess($access){
    $query = $this->db->query("UPDATE tbl_access SET access = '$access' WHERE accessID = 1");
   }

   public function getCurrentPricingListParty()
   {
    $SQL = "SELECT A.`orderID`, B.`dateOfOrder`, A.`feesOfDelivery`, A.`exFactoryPrice`, A.`totalPrice`, A.`advanceAmount`, A.`creditAmount`, A.`daysOfCredit`, C.`partyName` FROM `tbl_order_pricing` A 
    JOIN `tbl_order_master` B on A.orderID=B.orderID 
    JOIN `tbl_party_master` C on C.partyID=B.partyID where A.`pricingEdit`=1 and A.`creditAmount`>0";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function getPastPricingListParty()
   {
    $SQL = "SELECT A.`orderID`, B.`dateOfOrder`, A.`feesOfDelivery`, A.`exFactoryPrice`, A.`totalPrice`, A.`advanceAmount`, A.`creditAmount`, A.`daysOfCredit`, C.`partyName` FROM `tbl_order_pricing` A 
    JOIN `tbl_order_master` B on A.orderID=B.orderID 
    JOIN `tbl_party_master` C on C.partyID=B.partyID where A.`pricingEdit`=1 and A.`creditAmount`<1";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getPricingDashboardList()
   {
    $SQL = "SELECT A.`orderID`, B.`dateOfOrder`, A.`feesOfDelivery`, A.`exFactoryPrice`, A.`totalPrice`, A.`advanceAmount`, A.`creditAmount`, A.`daysOfCredit`, C.`partyName` FROM `tbl_order_pricing` A 
    JOIN `tbl_order_master` B on A.orderID=B.orderID 
    JOIN `tbl_party_master` C on C.partyID=B.partyID where A.`pricingEdit`=1 and A.`creditAmount`>0 and A.`daysOfCredit`<=CURDATE();";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getStockDashboardList()
   {
    $SQL = "SELECT C.productName, A.requiredQuantity, B.producedQuantity FROM (SELECT productID, (sum(remainingQuantity)-SUM(dispatchedQuantity)) AS requiredQuantity FROM `tbl_order_dispatched` GROUP BY productID) A RIGHT JOIN (SELECT productID, SUM(quantityProduced) producedQuantity FROM `tbl_manufacture_to_product` GROUP BY productID) B on A.productID=B.productID JOIN `tbl_product_master`C where C.productID=B.productID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

    public function getOrderStatusList()
   {
    $SQL = "SELECT *
            FROM `tbl_order_status_master`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getPricing($editOrderID)
   {
    $SQL = "SELECT *
            FROM `tbl_order_pricing` where orderID=$editOrderID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function updatePricing($data,$where)
  {
     $table_name = "tbl_order_pricing";
    return $this->db->update($table_name, $data, $where);
  }

  public function insertPricing($data)
  {
    $table_name="tbl_order_pricing";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function getProductionList()
  {
    $SQL = "SELECT *
            FROM `tbl_manufactured_products`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getProductionListPlant()
  {
    $SQL = "SELECT  A.`mproductID`, A.`plantID`, A.`dateFrom`, A.`dateTo`, A.`targetOfProduction`, A.`producedAmount`, A.`deviation`, A.`rateOfTPPerDay`, A.`rateOfPAPerDay`, A.`rateOfDeviationPerDay`, B.`plantName` FROM `tbl_manufactured_products` A JOIN `tbl_manufacturing_plant_master` B ON A.`plantID` = B.`plantID`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function getProduction($editProductionID)
  {
    $SQL = "SELECT *
            FROM `tbl_manufactured_products` where mProductID=$editProductionID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function getProductionProduct($editProductionID)
  {
    $SQL = "SELECT A.`m2productID`, A.`mproductID`, A.`productID`, A.`quantityTarget`, A.`quantityProduced`, B.`productName` 
            FROM `tbl_manufacture_to_product` A JOIN `tbl_product_master` B ON A.`productID` = B.`productID`  where mproductID=$editProductionID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function updateProduction($data,$where)
  {
     $table_name = "tbl_manufactured_products";
    return $this->db->update($table_name, $data, $where);
  }

  public function insertProduction($data)
  {
    $table_name="tbl_manufactured_products";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function getPartyList()
   {
    $SQL = "SELECT *
            FROM `tbl_party_master`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getParty($editPartyID)
   {
    $SQL = "SELECT *
            FROM `tbl_party_master` where partyID=$editPartyID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function updateParty($data,$where)
  {
     $table_name = "tbl_party_master";
    return $this->db->update($table_name, $data, $where);
  }
  
  public function insertProductToOrder($data)
  {
    $table_name="tbl_order_to_product";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function insertManufactureToProduct($data)
  {
    $table_name="tbl_manufacture_to_product";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function insertParty($data)
  {
    $table_name="tbl_party_master";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

    public function getPlantList()
   {
    $SQL = "SELECT *
            FROM `tbl_manufacturing_plant_master`";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getPlant($editPlantID)
   {
    $SQL = "SELECT *
            FROM `tbl_manufacturing_plant_master` where plantID=$editPlantID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }
   public function updatePlant($data,$where)
  {
     $table_name = "tbl_manufacturing_plant_master";
    return $this->db->update($table_name, $data, $where);
  }

  public function insertPlant($data)
  {
    $table_name="tbl_manufacturing_plant_master";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }

  public function getCurrentOrderList()
   {
    $SQL = "SELECT A.dateOfOrder as dateOfOrder, A.orderID as orderID, A.partyID, B.partyID, B.partyName as partyID, A.destination as destination, A.fullDeliveryAddress as fullDeliveryAddress, A.statusID, C.statusID, C.statusFullName as statusID, A.adminID, D.adminID, D.adminName as adminID, A.totalQuantity as totalQuantity 
            FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_status_master` C, `tbl_admin` D
            WHERE A.partyID=B.partyID AND A.statusID=C.statusID AND A.adminID=D.adminID AND A.statusID<4 AND A.statusID>1";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getPastOrderList()
   {
    $SQL = "SELECT A.dateOfOrder as dateOfOrder, A.orderID as orderID, A.partyID, B.partyID, B.partyName as partyID, A.destination as destination, A.fullDeliveryAddress as fullDeliveryAddress, A.statusID, C.statusID, C.statusFullName as statusID, A.adminID, D.adminID, D.adminName as adminID, A.totalQuantity as totalQuantity 
            FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_status_master` C, `tbl_admin` D
            WHERE A.partyID=B.partyID AND A.statusID=C.statusID AND A.adminID=D.adminID AND A.statusID>3";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

  public function getOrderListDashboard()
   {
    $SQL = "SELECT A.dateOfOrder as dateOfOrder, A.orderID as orderID, A.partyID, B.partyID, B.partyName as partyID, A.destination as destination, A.fullDeliveryAddress as fullDeliveryAddress, A.statusID, C.statusID, C.statusFullName as statusID, A.adminID, D.adminID, D.adminName as adminID, A.totalQuantity as totalQuantity 
            FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_status_master` C, `tbl_admin` D
            WHERE A.partyID=B.partyID AND A.statusID=C.statusID AND A.adminID=D.adminID AND A.statusID=1";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getOrder($editOrderID)
   {
    $SQL = "SELECT *
            FROM `tbl_order_master` where orderID=$editOrderID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function getOrderParty($editOrderID)
   {
    $SQL = "SELECT A.`orderID`, A.`dateOfOrder`, A.`partyID`, A.`destination`, A.`fullDeliveryAddress`, A.`statusID`, A.`adminID`, A.`totalQuantity`, B.`partyName` FROM `tbl_order_master` A join `tbl_party_master` B ON B.`partyID`=A.`partyID` where A.`orderID`=$editOrderID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
   }

   public function updateOrder($data,$where)
  {
     $table_name = "tbl_order_master";
    return $this->db->update($table_name, $data, $where);
  }

  public function getOrderAdminName($adminID)
  {
    $SQL = "SELECT adminName
            FROM `tbl_admin` where adminID=$adminID";
    $query = $this->db->query($SQL);
    $result = $query->result_array();
    return $result;
  }

  public function insertOrder($data)
  {
    $table_name="tbl_order_master";
    $this->db->insert($table_name, $data);
    $incremented_id = $this->db->insert_id(); // fetching auto incremented value after inserting
    return $incremented_id;
  }


  public function sp_get_user_checklist_adm($userID) {
       return $this->my_db->GetResults("CALL sp_get_user_checklist_adm($userID)");
  }
  public function sp_save_user_checklist_adm($userID, $checkedChecklistIDs,$mdate,$manualVerify) {

        $query = $this->db->query("UPDATE tbl_user_details SET idverify_dummy = '$manualVerify' WHERE userID = '$userID'");
        $adminUserID = $this->qg_config_validation->_get_logged_in_user_id();
       return $this->my_db->GetResults("CALL sp_save_user_checklist_adm($userID, '$checkedChecklistIDs', $adminUserID,'$mdate')");
  }

  public function sp_get_admin_module_permissions_by_role($roleID) {
    return $this->my_db->GetResults("CALL sp_get_admin_module_permissions_by_role($roleID)");
  }

  public function sp_get_admin_field_permissions_by_role($roleID) {
    return $this->my_db->GetResults("CALL sp_get_admin_field_permissions_by_role($roleID)");
  }

  public function sp_add_new_admin_module($name, $displayName, $order) {
    return $this->my_db->GetResults("CALL sp_add_new_admin_module('$name', '$displayName', '$order')");
  }

  public function sp_add_new_admin_fields($name, $module) {
    return $this->my_db->GetResults("CALL sp_add_new_admin_fields('$name', '$module')");
  }
  public function sp_admin_login($userID, $password)
  {
    // print_r("CALL sp_admin_login('$userID', '$password')");exit();
    return $this->my_db->GetResults("CALL sp_admin_login('$userID', '$password')");
  }
  public function sp_add_new_admin_role($moduleName)
  {
    return $this->my_db->GetResults("CALL sp_add_new_admin_role('$moduleName')");
  }


}
?>
