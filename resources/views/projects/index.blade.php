@extends('layouts.app')

@section('content')
    <div>
        <livewire:projects>
    </div>
@endsection


@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#createProjectModal').modal('hide');
            $('#updateProjectModal').modal('hide');
            $('#deleteProjectModal').modal('hide');
            $('#timerModal').modal('hide');
            $('#deleteTimeModal').modal('hide');
            $('#updateTimeModal').modal('hide');
        });

        window.addEventListener('start-timer', event => {
            let startDate = new Date(event.detail.timer.start_at).getTime();
            startTimer(startDate);

            function startTimer(startDate) {
                setInterval(function() {
                    var now = new Date().getTime();
                    var distance = now - startDate;

                    // Cálculo de horas, minutos y segundos
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Muestra el resultado en un elemento HTML con id "timer"
                    document.getElementById("timer_" + event.detail.timer.id).innerHTML = hours + "h " +
                        minutes + "m " + seconds + "s ";
                }, 1000);
            }
        });
    </script>
@endsection
