<div class="modal fade" id="editaccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!--id เปลี่ยนให้ตรงกับ data-bs-toggle="#userModal" ในปุ่ม-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body"> <!--เป็นฟอร์มใช้ insert ข้อมูล-->
                <!-- <img src="../img/editaccount.webp" class="w-50 d-block mx-auto"> -->
                <form action="../config/editaccount_db.php" method="POST">
                    <div class="mb-0">
                        <input type="hidden" readonly value="<?php echo $row['id']; ?>" required class="form-control" name="id">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" value="<?php echo $row['name']; ?>" required class="form-control" name="name">
                    </div>
                    <div class="mb-0">
                        <label for="surname" class="col-form-label">Surname:</label>
                        <input type="text" value="<?php echo $row['surname']; ?>" required class="form-control" name="surname">
                    </div>
                    <div class="mb-0">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="email" value="<?php echo $row['email']; ?>" required class="form-control" name="email">
                    </div>
                    <div class="mb-0">
                        <label for="position" class="col-form-label">Position:</label>
                        <input type="text" value="<?php echo $row['position']; ?>" required class="form-control" name="position">
                    </div>
                    <div class="mb-0">
                        <label for="organisation" class="col-form-label">Organisation:</label>
                        <input type="text" value="<?php echo $row['organisation']; ?>" class="form-control" name="organisation">
                    </div>

                    <div class="mt-0">
                        <label for="password" class="col-form-label">Password (4 Characters Minimum):</label>
                        <input type="password" minlength="4" required class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="col-form-label">Confirm Password:</label>
                        <input type="password" minlength="4" required class="form-control" name="confirmpassword">
                    </div>

                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-dark">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>