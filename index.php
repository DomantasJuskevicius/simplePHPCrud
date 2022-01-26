<?php
require './records/records.php';
$records = getRecords();
include_once './includes/navbar.php'
?>
<section>
    <div class="table">
        <button class="addButton">
            <a href="add.php">
                <li>Create an appointment</li>
            </a>
        </button>
        <table class="tContainer">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)) : ?>
                    <?php foreach ($records as $record) : ?>
                        <tr>
                            <td><?php echo $record['name'] ?></td>
                            <td><?php echo $record['email'] ?></td>
                            <td><?php echo $record['phone'] ?></td>
                            <td><?php echo $record['address'] ?></td>
                            <td><?php echo $record['datetime'] ?></td>
                            <td>
                                <div>
                                    <button> <a href="edit.php?id=<?php echo $record['id'] ?>">edit</a></button>
                                    <form method="POST" action="delete.php">
                                        <input type="hidden" name="id" value="<?php echo $record['id'] ?>">
                                        <button onclick="deleteRec(<?php echo $record['id']; ?>)" name="Delete" value="Delete"> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;; ?>
                <?php else : ?>
                    <tr>
                        <td>No appointments are made, feel free to register</td>
                    </tr>
                <?php
                endif
                ?>

            </tbody>
        </table>
    </div>
</section>
<?php
include_once './includes/footer.php'
?>