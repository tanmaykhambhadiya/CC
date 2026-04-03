<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Orders</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Pickup Name</th>
                                <th>Pickup Address</th>
                                <th>Pickup Phone</th>
                                <th>Drop-in Name</th>
                                <th>Drop-in Address</th>
                                <th>Drop-in Phone</th>
                                <th>Truck Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $statement = $pdo->prepare("SELECT * FROM orders ORDER BY id ASC");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo htmlspecialchars($row['pickup_firstname'] . ' ' . $row['pickup_lastname']); ?></td>
                                    <td>
                                        <?php echo htmlspecialchars($row['pickup_address']); ?>
                                        <?php if (!empty($row['pickup_apartment'])): ?>
                                            , <?php echo htmlspecialchars($row['pickup_apartment']); ?>
                                        <?php endif; ?>
                                        , <?php echo htmlspecialchars($row['pickup_city'] . ', ' . $row['pickup_state'] . ', ' . $row['pickup_zipcode'] . ', ' . $row['pickup_country']); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['pickup_phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['dropin_firstname'] . ' ' . $row['dropin_lastname']); ?></td>
                                    <td>
                                        <?php echo htmlspecialchars($row['dropin_address']); ?>
                                        <?php if (!empty($row['dropin_apartment'])): ?>
                                            , <?php echo htmlspecialchars($row['dropin_apartment']); ?>
                                        <?php endif; ?>
                                        , <?php echo htmlspecialchars($row['dropin_city'] . ', ' . $row['dropin_state'] . ', ' . $row['dropin_zipcode'] . ', ' . $row['dropin_country']); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['dropin_phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['truck_name']); ?></td>
                                    <td><?php echo number_format((float)$row['price'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                    <td><?php echo number_format((float)$row['subtotal'], 2); ?></td>
                                    <td><?php echo number_format((float)$row['tax'], 2); ?></td>
                                    <td><?php echo number_format((float)$row['total'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                    <td>
                                        <a href="order-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
