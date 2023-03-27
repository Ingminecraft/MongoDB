<?php
    require_once 'vendor\autoload.php';
    $conn = new MongoDB\Client("mongodb://localhost:27017");
    $db = $conn->db63410043ecommerce;
    $products = $db->products;
    $categories = $db->categories;
    $reviews = $db->reviews;
    
    $products = $products->find(array(),array('projection'=>array('_id'=>false)));
    $prod_data = iterator_to_array($reviews);

    $categories = $categories->find();
    $categories = iterator_to_array($categories);

    $reviews = $reviews->find();
    $reviews = iterator_to_array($reviews);

?>
<html>
<body>
<table>
	<thead>
		<tr>
			<?php foreach ($prod_data[0] as $key=>$value): ?>
			<th>
				<?php echo $key; ?>
			</th>
			<?php endforeach; ?>
		</tr>
	</thead>
    <tbody>
        <?php foreach ($prod_data as $entry) :?>
            <tr>
                <?php foreach ($entry as $key=>$value) : ?>
                    <td>
                        <?php if(count((array)$value)>1) :?>
                            <?php foreach($value as $detail) : ?>
                                <?php if(count((array)$detail)>1) : ?>
                                    <?php foreach($detail as $pr_hit) : ?>
                                        <?php echo $pr_hit; ?>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php echo $detail ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php echo $value ?>
                        <?php endif; ?>
                    </td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </tbody>
   </body>
   </table>	
</html>