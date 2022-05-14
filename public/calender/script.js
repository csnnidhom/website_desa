$(document).ready(function() {

    $('#calendar').fullCalendar({
      timezone: 'local',
      height: "auto",
      selectable: true,
      dragabble: true,
      defaultView: 'month',
  
      durationEditable: true,
      bootstrap: false,
    })
  });