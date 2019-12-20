(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;

        var time = h;
        console.log(time);
        if (time >= '16' && time <= '17') {
            // console.log('oke');
        } else {
            $('.absent').html('Absent Telah Ditutup').attr("disabled", true);
        }

        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();