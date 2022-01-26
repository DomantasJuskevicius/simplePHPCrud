<?php
require './records/records.php';
$records = getRecords();
include_once './includes/navbar.php'
?>
<section>
    <button>
        <a href="add.php">
            <li>Create an appointment</li>
        </a>
    </button>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td><?php echo $record['name'] ?></td>
                    <td><?php echo $record['email'] ?></td>
                    <td><?php echo $record['phone'] ?></td>
                    <td><?php echo $record['address'] ?></td>
                    <td><?php echo $record['date'] ?></td>
                    <td>
                        <div>
                            <button> <a href="edit.php?id=<?php echo $record['id'] ?>">edit</a></button>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $record['id'] ?>">
                                <button>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach;; ?>
        </tbody>
    </table>
</section>
<?php
include_once './includes/footer.php'
?>