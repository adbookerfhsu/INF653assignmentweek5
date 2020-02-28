<?php
require('./model/database.php');
require('./model/item_db.php');
require('./model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $items = get_items_by_category($category_id);
    include('item_list.php');
} else if ($action == 'delete_item') {
    $item_num = filter_input(INPUT_POST, 'item_num', 
            FILTER_VALIDATE_INT);
    delete_item($item_num);
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('additemform.php');    
} else if ($action == 'add_item') {
    $title = filter_input(INPUT_POST, 'Title');
    $description = filter_input(INPUT_POST, 'Description');
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($title == null || $description == null) {
        $error = "Invalid data. Fields can not be empty. Check all fields and try again.";
        include('./errors/error.php');
    } else {
    add_item($title, $description, $category_id);
    header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('./errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
}  else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>