<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class ChartModel extends CI_Model {
 
    function __construct() {
        
    }
 
    function get_target_data() {
        $query = "SELECT SUM(A.quantityTarget) AS target, SUM(A.quantityProduced) AS produced, B.productName as productID from tbl_manufacture_to_product A, tbl_product_master B where A.productID=B.productID group by productID";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_manufactured_dispatched_data() {
        $query = "SELECT SUM(A.producedAmount) AS produced, SUM(B.dispatchedQuantity) AS dispatched from tbl_manufactured_products A, tbl_order_dispatched B";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_produced_dispatched() {
        $query = "SELECT SUM(A.producedAmount) AS produced, SUM(B.totalQuantity) AS ordered from tbl_manufactured_products A, tbl_order_master B";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_selling() {
        $query = "SELECT SUM(A.producedAmount) AS produced, SUM(B.totalQuantity) AS ordered from tbl_manufactured_products A, tbl_order_master B";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_target_dispatched_data($sDate,$eDate) {
        $query = "SELECT SUM(A.remainingQuantity) AS totalQuantity, SUM(A.dispatchedQuantity) AS dispatchedQuantity, B.productName from tbl_order_dispatched A, tbl_product_master B where A.productID=B.productID and A.dispatchedDate<='".$eDate."' and A.dispatchedDate>='".$sDate."' GROUP BY A.productID";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_party_data($partyID) {
        $query = "SELECT A.totalQuantity as produced, A.orderID as orderID, B.partyName as partyName, C.statusFullName as status, A.dateOfOrder as dateOfOrder, SUM(D.dispatchedQuantity) as dispatchedQuantity, SUM(D.remainingQuantity) as remainingQuantity, E.totalPrice as totalPrice, E.advanceAmount as advanceAmount, E.creditAmount as creditAmount FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_status_master` C, `tbl_order_dispatched` D, `tbl_order_Pricing` E where B.partyID=$partyID and D.orderID=A.orderID and E.orderID=A.orderID and C.statusID=A.statusID and A.partyID=$partyID GROUP BY A.orderID";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_selling_party_data() {
        $query = "SELECT SUM(A.totalQuantity) as produced, B.partyName as partyName FROM `tbl_order_master` A, `tbl_party_master` B where  B.partyID=A.partyID GROUP BY B.partyName";//
        //$query = "SELECT SUM(D.dispatchedQuantity) as dispatchedQuantity, SUM(D.remainingQuantity) as remainingQuantity, E.totalPrice as totalPrice, E.advanceAmount as advanceAmount, E.creditAmount as creditAmount FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_dispatched` D, `tbl_order_Pricing` E where  D.orderID=A.orderID and E.orderID=A.orderID and B.partyID=A.partyID GROUP BY A.partyID";
        $query= $this->db->query($query);
        $results['chart_data'][0] = $query->result();
        $query = "SELECT SUM(D.dispatchedQuantity) as dispatchedQuantity, SUM(D.remainingQuantity) as remainingQuantity, E.totalPrice as totalPrice, E.advanceAmount as advanceAmount, E.creditAmount as creditAmount FROM `tbl_order_master` A, `tbl_party_master` B, `tbl_order_dispatched` D, `tbl_order_Pricing` E where  D.orderID=A.orderID and E.orderID=A.orderID and B.partyID=A.partyID GROUP BY A.partyID";
        $query = $this->db->query($query);
        $results['chart_data'][1] = $query->result();
        return $results;
    }

    function get_selling_destination_data() {
        $query = "SELECT SUM(A.totalQuantity) as produced, A.destination as destination FROM `tbl_order_master` A GROUP BY A.destination";
        $query= $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }
    
    function get_selling_product_data() {
        $query = "SELECT SUM(A.totalQuantity*B.percantageOfOrder/100) as produced, C.productName as productName FROM `tbl_order_master` A, `tbl_order_to_product` B, `tbl_product_master`C where A.orderID=B.orderID and B.productID=C.productID GROUP BY B.productID";
        $query= $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }

    function get_manufactured_data() {
        $query = "SELECT A.productName as productName, SUM(B.quantityProduced) as produced, IFNULL(C.requirement,0) as ordered, A.productID FROM `tbl_product_master` A JOIN `tbl_manufacture_to_product` B ON A.productID=B.productID LEFT JOIN (SELECT SUM(A.totalQuantity*B.percantageOfOrder/100) as requirement, B.productID as productID from `tbl_order_master` A JOIN `tbl_order_to_product` B ON A.orderID=B.orderID GROUP BY B.productID) C ON A.productID=C.productID group BY A.productID /*SELECT SUM(A.producedAmount) AS produced, SUM(B.totalQuantity) AS ordered from tbl_manufactured_products A, tbl_order_master B*/";
        $query = $this->db->query($query);
        $results['chart_data'] = $query->result();
        return $results;
    }
}