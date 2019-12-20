<?php

require_once('database.php');

/**
 * Create
 */
function create($name, $address)
{
  $connection = connect();

  $sql = "INSERT INTO host (name, address) VALUES ('${name}', '${address}');";

  try {
    $connection->exec($sql);
    return $connection->lastInsertId();
  } catch (PDOExecption $e) {
    $connection->rollback();
    print "Error!: " . $e->getMessage();
    return null;
  }
}

/**
 *  Read by ID
 */
function read($id)
{
  $connection = connect();
  $sql = "SELECT * FROM host WHERE id = ${id}";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
}

/**
 * Read by Name and Address
 */
function readByNameAddress($name, $address)
{
  $connection = connect();
  $sql = "SELECT * FROM host WHERE name='${name}' AND address='${address}'";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetch(PDO::FETCH_ASSOC) : null;
}

/**
 * Read All
 */
function readAll()
{
  $connection = connect();
  $sql = "SELECT * FROM host";
  $pdoStm = $connection->query($sql);
  return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
}

/**
 * Read or Create
 */
function readOrCreate($name, $address)
{
  $connection = connect();
  $result = readByNameAddress($name, $address);

  if ($result) {
    return $result;
  } else {
    return create($name, $address);
  }
}

/**
 * Update
 */
function update($name, $address, $id)
{
  $connection = connect();

  $sql = "UPDATE host
          SET name='${name}', address='${address}'
          WHERE id=${id}";

  try {
    return $connection->exec($sql);
  } catch (PDOExecption $e) {
    $connection->rollback();
    print "Error!: " . $e->getMessage();
  }
}

/**
 * Delete
 */
function delete($id)
{
  $connection = connect();

  $sql = "DELETE FROM host WHERE id=${id}";

  try {
    return $connection->exec($sql);
  } catch (PDOExecption $e) {
    $connection->rollback();
    print "Error!: " . $e->getMessage();
  }
}
