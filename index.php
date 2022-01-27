<?php
require './records/records.php';
$unfilteredRecords = getRecords();
$records = array();
include_once './includes/navbar.php'
?>
<section>
    <div class="table">
        <div>
            <button class="addButton">
                <a href="add.php">
                    <li>Create an appointment</li>
                </a>
            </button>
            <div>
                <form action="" method="GET">
                    <div>
                        <div>
                            <label for="">Choose a date you want to check</label>
                            <input type="date" name="chosenDate">
                        </div>
                        <div>
                            <label for="">Click to filter by date</label>
                            <button type="submit" class="filterButton">Filter</button>
                        </div>
                    </div>

                </form>
            </div>
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" name="upload_file" class="">
                </form>
            </div>
        </div>

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
                <?php if (!empty($unfilteredRecords)) : ?>
                    <?php
                    if (isset($_GET['chosenDate'])) :
                        $date = $_GET['chosenDate'];
                        foreach ($unfilteredRecords as $record) {
                            if (date("Y-m-d", strtotime($date)) == date("Y-m-d", strtotime($record['datetime']))) {
                                $records[] = $record;
                            }
                        }
                        usort($records, function ($a, $b){
                            return $a['datetime'] <=> $b['datetime'];
                        });
                    else :
                        $records = $unfilteredRecords;
                    endif
                    ?>
                    <?php foreach ($records as $record) : ?>
                        <tr>
                            <td><?php echo $record['name'] ?></td>
                            <td><?php echo $record['email'] ?></td>
                            <td><?php echo $record['phone'] ?></td>
                            <td><?php echo $record['address'] ?></td>
                            <td><?php echo date('Y-m-d-H:i', strtotime($record['datetime'])) ?></td>
                            <td>
                                <div class="buttonContainer">
                                    <button style="color:yellow"> <a href="edit.php?id=<?php echo $record['id'] ?>">edit</a></button>
                                    <form method="POST" action="delete.php">
                                        <input type="hidden" name="id" value="<?php echo $record['id'] ?>">
                                        <button style="color:red" onclick="deleteRec(<?php echo $record['id']; ?>)" name="Delete" value="Delete"><a>Delete</a> </button>
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