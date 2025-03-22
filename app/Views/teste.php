<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/teste.css') ?>">
</head>

<body>
    <div id="calendar-wrapper">
        <div id="external-events">
            <!-- Disciplinas arrastáveis -->
            <div class="fc-event" data-duration="1">Matemática</div>
            <div class="fc-event" data-duration="2">Português</div>
        </div>

        <div id="calendar"></div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/resource-timeline@6.1.10/index.global.min.js"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/index.global.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/fullcalendar/core/locales-all.global.min.js') ?>"></script>
<script src="<?= base_url('assets/js/teste.js') ?>"></script>

</html>