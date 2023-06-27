<div class="modal fade" id="userLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!--id เปลี่ยนให้ตรงกับ data-bs-toggle="#userModal" ในปุ่ม-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">BookingApp - Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body"> <!--เป็นฟอร์มใช้ insert ข้อมูล-->
                <img src="img/key.webp" class="w-50 d-block mx-auto">
                <form action="config/signin_db.php" method="POST">
                    <div class="mb-0">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="email" required class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" minlength="4" required class="form-control" name="password">
                    </div>
  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="signin" class="btn btn-warning">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>