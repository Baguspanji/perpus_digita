<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark" data-trigger="bg-white-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">Perpus Apps</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <span class="badge badge-info" id="clock"></span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>auth/login/" class="nav-link">Login admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-white my-3">
    <h3>Selamat Datang</h3>
    <p class="p-0 m-0">Selamat datang di halaman aplikasi perpus. Masuk dengan akun untuk melihat daftar bacaan, kelola peminjaman dan melihat buku yang telat dikembalikan.</p>
</div>

<script>
    $(document).ready(function() {
        setInterval('updateClock()', 1000);
    });

    function updateClock() {
        var currentTime = new Date();
        var currentHours = currentTime.getHours();
        var currentMinutes = currentTime.getMinutes();
        var currentSeconds = currentTime.getSeconds();

        // Show Date
        var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        var dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];

        var newDate = new Date();
        newDate.setDate(newDate.getDate() + 1);

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";
        // Convert the hours component to 12-hour format if needed
        currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
        // Convert an hours component of "0" to "12"
        currentHours = (currentHours == 0) ? 12 : currentHours;
        // Compose the string for display
        var currentTimeString = dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear() + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

        $("#clock").html(currentTimeString);
    }
</script>