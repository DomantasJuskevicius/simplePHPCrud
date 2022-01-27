<section class="form">
    <div class="signup-form-form">
        <div class="formHeader">
            <h1>
                <?php if (!empty($record['id'])): ?>
                    Hello <b><?php echo $record['name'] ?></b>
                    <p>would you like to change your appointment ?</p>
                <?php else : ?>
                    Create new appointment
                <?php endif ?>
            </h1>
        </div>
        <div class="formBody">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $record['name'] ?>" class="validation <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                <div class="errorText">
                    <?php echo  $errors['name'] ?>
                </div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $record['email'] ?>" class="validation <?php echo $errors['email'] ? 'is-invalid' : '' ?>">
                <div class="errorText">
                    <?php echo  $errors['email'] ?>
                </div>
                <label>Phone Number</label>
                <input type="text" name="phone" value="<?php echo $record['phone'] ?>" class="validation <?php echo $errors['phone'] ? 'is-invalid' : '' ?>">
                <div class="errorText">
                    <?php echo  $errors['phone'] ?>
                </div>
                <label>Apartment adress</label>
                <input type="text" name="address" value="<?php echo $record['address'] ?>" class="validation <?php echo $errors['address'] ? 'is-invalid' : '' ?>">
                <div class="errorText">
                    <?php echo  $errors['address'] ?>
                </div>
                <label>When do you want it cleaned</label>
                <input type="datetime-local" name="datetime" value="<?php echo date('Y-m-d\TH:i', strtotime($record['datetime'])) ?>" class="validation <?php echo $errors['datetime'] ? 'is-invalid' : '' ?>">
                <div class="errorText">
                    <?php echo  $errors['datetime'] ?>
                </div>
                <button>Confirm</button>
            </form>
        </div>
    </div>
</section>