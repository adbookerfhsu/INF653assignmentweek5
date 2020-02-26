<?php
function get_items_by_category($category_id) {
    if ($category_id == NULL || $category_id == FALSE) {
        global $db;
        
        $query = 'SELECT * FROM todoitems
                  ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
       
        
    } else {
        
        global $db;
        $query = 'SELECT * FROM todoitems
              WHERE todoitems.categoryID = :category_id
              ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        
    }return $items;
}
   

function get_item($item_num) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
    $category_name = $item['categoryID'];
    return $item;

}

function delete_item($item_num) {
    global $db;
    $query = 'DELETE FROM todoitems
              WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($title, $description, $category_id) {
    global $db;
    $query = 'INSERT INTO todoitems
                 (Title, Description, categoryID)
              VALUES
                 ( :Title, :Description, :category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Title', $title);
    $statement->bindValue(':Description', $description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>