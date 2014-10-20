<?php
/**
 * Created by PhpStorm.
 * User: voyaging
 * Date: 14. 10. 18.
 * Time: 오전 9:48
 */

require('../config/database.php');

class BoardService {

	public static function query($query, $params=NULL, $return_type=NULL) {
		$dbh = self::getPDO();
		$stmt = $dbh->prepare($query);

		if ($return_type) {
			$stmt->setFetchMode(PDO::FETCH_CLASS, $return_type);
		}

		if ($params) {
			self::setParameters($stmt, $params);
		}

		$result = array();
		if ($stmt->execute()) {
			$result = $stmt->fetchAll();
		}

		return $result;
	}

	public static function update($query, $params=NULL) {
		$dbh = self::getPDO();
		$stmt = $dbh->prepare($query);

		if ($params) {
			self::setParameters($stmt, $params);
		}

		return $stmt->execute();
	}

	private static function setParameters($stmt, $params) {
		foreach($params as $name => $param) {
			$stmt->bindParam($name, $param['value'], $param['type']);
		}
	}

	private static function getPDO() {
		global $db;
		return new PDO("mysql:host=".$db['hostname'].";dbname=".$db['database'], $db['username'], $db['password']);
	}
}