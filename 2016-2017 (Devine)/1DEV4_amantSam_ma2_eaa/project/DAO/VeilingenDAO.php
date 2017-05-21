<?php
require_once( __DIR__ . '/DAO.php');
class VeilingenDAO extends DAO {

  public function selectTop($id) {
   $sql = "SELECT * FROM `eaa_bids` WHERE object_id = :id ORDER BY bid DESC LIMIT 1";
   $stmt = $this->pdo->prepare($sql);
   $stmt->bindValue(':id', $id);
   $stmt->execute();
   return $stmt->fetch(PDO::FETCH_ASSOC);
 }

  public function topThreeBids($id) {
    $sql = "SELECT * FROM `eaa_bids` WHERE object_id = :id ORDER BY bid DESC LIMIT 0,3";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function validate($data) {
    $errors = [];
    if (!isset($data["name"])) {
      $errors["name"] = "Gelieve uw naam in te geven.";
    }
    if (!isset($data["bid"])) {
      $errors["bid"] = "Gelieve een bod in te geven.";
    } else {
      $topbid = $this->selectTop($data["object_id"]);
      if ($data["bid"] <= $topbid["bid"]) {
        $errors["bid"] = "Bod is te klein";
      }
    }
    return $errors;
  }

  public function insert($data) {
      $query = "INSERT INTO `eaa_bids` (`name`, `bid`, `object_id`) VALUES (:name, :bid, :object_id)";
      $state = $this->pdo->prepare($query);
      $state->bindValue(':name', $data["name"]);
      $state->bindValue(':bid', $data["bid"]);
      $state->bindValue(':object_id', $data["object_id"]);
      $state->execute();
  }
}
