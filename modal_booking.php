<div class="modal fade" id="userBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!--id เปลี่ยนให้ตรงกับ data-bs-toggle="#userModal" ในปุ่ม-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">New Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body"> <!--เป็นฟอร์มใช้ insert ข้อมูล-->
                <img src="../img/calendar.webp" class="w-50 d-block mx-auto">
                <form action="../config/booking_db.php" method="POST">
                    <div class="mb-0">
                        <label for="name" class="col-form-label">Scheduler:</label>
                        <input type="text" readonly value="<?php echo $row['name'] . ' ' . $row['surname']. ' '; ?>" required class="form-control" name="scheduler">
                    </div>
                    <div class="mb-0">
                        <label for="purpose" class="col-form-label">Purpose:</label>
                        <input type="text" required class="form-control" placeholder="your purpose.." name="purpose">
                    </div>
                    <div class="mb-0">
                        <label for="room" class="col-form-label">Room:</label>
                        <select class="form-select form-select-md" required onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
                            <option value="">Please select the rooms..</option>
                            <option value="1">Room1</option>
                            <option value="2">Room2</option>
                            <option value="3">Room3</option>
                            <option value="4">Room4</option>
                            <option value="5">Room5</option>
                        </select>
                        <input type="hidden" name="room" id="text_content" value="" />
                    </div>
                    <div class="mb-0">
                        <label for="date" class="col-form-label">Start Date:</label>
                        <input type="date" required class="form-control" name="startdate">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Finished Date:</label>
                        <input type="date" required class="form-control" name="finisheddate">
                    </div>

                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="booking" class="btn btn-primary" onclick="return confirm('Please confirm for booking ?')">Submit</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>