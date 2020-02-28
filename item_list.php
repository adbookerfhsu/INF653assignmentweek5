<?php include 'view/header.php'; ?>
<main>

 <!-- display a list of categories -->
 <aside>
     <br>
        <?php if ($categories != NULL) { ?>
                <form action="." method="get" id="choose_category">
                <label>Category:</label>
                <select name="category_id">
                    <option value="0">View All Categories</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select> 
                <input type="submit" value="Submit" class="purple button">
                </form>
            <?php } ?>
       
    </aside>    

    <?php if ($items != 0) { ?>
    <h1><?php echo $category_name; ?></h1>
    <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>&nbsp;</th>
            </tr>
                    
                <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?php echo $item['Title']; ?></td>
                    <td><?php echo $item['Description']; ?></td>
                <?php if($item['categoryName'] == NULL || $item['categoryName'] == FALSE) { ?> 
                    <td> None </td> 
                <?php }else { ?> 
                    <td> <?php echo $item['categoryName'];?></td><?php }?>
                    <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_item">
                    <input type="hidden" name="item_num"
                           value="<?php echo $item['ItemNum']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $item['categoryID']; ?>">
                    <input type="submit" value="DELETE" class="red">
                </form></td>
                </tr>
                <?php endforeach; ?>
            
        
        </table>
            </br>
        
        <p><a href="?action=show_add_form">Click here to add new item</a></p>
                <?php } else {?>
                <p>No To Do Items Exist Yet. <a href="?action=show_add_form">Click here to add new item</a></p>
                <?php }?>
        <p><a href="index.php?action=list_items">View To Do List</a></p>        
        <p><a href="?action=list_categories">View/Edit Categories</a></p>
    </div>
</main>
<?php include 'view/footer.php'; ?>