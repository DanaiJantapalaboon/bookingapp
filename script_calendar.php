<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once 'config/connection.php';

    $data = array();
    $query = "SELECT * FROM booking";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll();
    //mysqli_set_charset($query, 'utf8');

    foreach($result as $row)
    {
        $data[] = array(
            'title' => "วัตถุประสงค์: " . $row["purpose"] . ', ' . "ห้อง: " . $row["room"] . ', ' . "ผู้จอง: " . $row["scheduler"],
            'start' => $row["start"],
            'end' => $row["end"] . "T23:59:00"
        );
    }
?>

<style>
    #calendar td.fc-day-sun, #calendar td.fc-day-sat {
    background-color: rgb(241, 241, 241);
}

    .fc-event-time, .fc-event-title {
    padding: 0 1px;
    white-space: normal;
}
</style>

<!-- สคริปต์ Full Calendar -->
<script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            displayEventTime: false,
            //initialDate: '2022-07-07',
            headerToolbar: {
            left: 'prev,next',
            /*left: 'prev,next today',*/
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,listWeek'
            /*right: 'dayGridMonth,timeGridWeek,timeGridDay'*/
            },
        
            events: <?php echo json_encode($data);?>
        /*events: [
            {
                title: 'All Day Event',
                start: '2022-07-01'
            },
            {
                title: 'All Day Event2',
                start: '2022-07-01'
            },
            {
                title: 'Long Event',
                start: '2022-07-07',
                end: '2022-07-10'
            },
            {
                groupId: '999',
                title: 'Repeating Event',
                start: '2022-07-09T16:00:00'
            },
            {
                groupId: '999',
                title: 'Repeating Event',
                start: '2022-07-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2022-07-11',
                end: '2022-07-13'
            },
            {
                title: 'Meeting',
                start: '2022-07-12T10:30:00',
                end: '2022-07-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2022-07-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2022-07-12T14:30:00'
            },
            {
                title: 'Birthday Party',
                start: '2022-07-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2022-07-28'
            }
        ]*/
        });

        calendar.render();

    });

</script>