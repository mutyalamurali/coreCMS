<?php

/**
 *  check sql query and stop page loads
 *  if not results
 *
 * @return void
 */
function confirm_query()
{
    global $db;
    die('Database query failed: ' . $db->error);
}

/**
 *  Get results using sql query
 *
 * @param String $sql
 * @return Array or void
 */
function findByQuery($sql)
{
    global $db;

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        confirm_query();
    } else {
        $stmt->execute();
        $result = $stmt->get_result();

        $result_arr = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $result_arr[] = $row;
            }
            return $result_arr;
        } else {
            die('No results found');
        }
    }
}

/**
 * Get all records from Table
 *
 * @param string $tblName
 * @return array
 */
function findAll($tblName)
{
    return findByQuery('SELECT * FROM ' . $tblName);
}

/**
 *  Get record from table by id
 *
 * @param string $tblName
 * @param int $id
 * @return array
 */
function findById($tblName, $id)
{
    global $db;

    $sql = 'SELECT * FROM ' . $tblName;
    $sql .= ' WHERE id = ? ';
    $sql .= ' LIMIT 1';

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        die('Database query failed: ' . $stmt->error);
    } else {
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}

/**
 * Create new menu name function
 *
 * @param string $menu_name
 * @param int $position
 * @param int $visible
 * @return Boolean
 */
function create_subject($menu_name, $position, $visible)
{
    global $db;

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) VALUES (?, ?, ?)";

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        die('Database insert query failed: ' . $db->error);
    } else {
        $stmt->bind_param('sii', $menu_name, $position, $visible);
        $result = $stmt->execute();

        if ($result == FALSE) {
            die('Can not insert new subject' . $stmt->error);
        } else {
            return TRUE;
        }
    }
}

function edit_subject($menu_name, $position, $visible, $id)
{
    global $db;

    $sql = "UPDATE subjects ";
    $sql .= "SET menu_name = ?, position = ?, visible = ? ";
    $sql .= "WHERE id = ?";

    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        die('Database insert query failed: ' . $db->error);
    } else {
        $stmt->bind_param('siii', $menu_name, $position, $visible, $id);
        $result = $stmt->execute();

        if ($result == FALSE) {
            die('Can not update subject' . $stmt->error);
        } else {
            return true;
        }
    }
}

function delete($tblName, $id)
{
    global $db;

    $sql = "DELETE FROM " . $tblName . " WHERE id = ? ";
    $stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        die('Database delete query failed: ' . $stmt->error);
    } else {
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();

        if ($result == FALSE) {
            die('Can not delete subject ' . $db->error);
        } else {
            $stmt->close();
            return true;
        }
    }
}
