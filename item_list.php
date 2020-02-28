<?php include 'view/header.php'; ?>
<main>

 <!-- display a list of categories -->
 <aside>
    
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
        </ul>
        </nav>        
    </aside>    

    
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
                    <td><?php echo $item['categoryID']; ?></td>
                    <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_item">
                    <input type="hidden" name="item_num"
                           value="<?php echo $item['ItemNum']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $item['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                </tr>
                <?php endforeach; ?>
            
        
        </table>
            </br>
        
        <p><a href="?action=show_add_form">Click here to add new item</a></p>
        <p><a href="?action=list_categories">View/Edit Categories</a></p>
    </div>
</main>
<?php include 'view/footer.php'; ?>